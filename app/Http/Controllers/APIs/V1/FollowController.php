<?php

namespace Zhiyi\Plus\Http\Controllers\APIs\V1;

use DB;
use Zhiyi\Plus\Models\User;
use Illuminate\Http\Request;
use Zhiyi\Plus\Jobs\PushMessage;
use Zhiyi\Plus\Models\UserDatas;
use Zhiyi\Plus\Http\Controllers\Controller;

class FollowController extends Controller
{
    /**
     * å
     * ³æ³¨ç¨æ·.
     *
     * @param  $user_id [è¢«å
     * ³æ³¨è
     * ID]
     *
     * @return [type] [description]
     */
    public function doFollow(Request $request)
    {
        $user_id = $request->user()->id;
        $follow_user_id = $request->user_id;

        $this->checkUserFollowData($follow_user_id, 'followed_count');
        $this->checkUserFollowData($user_id, 'following_count');

        DB::beginTransaction();

        try {
            $request->user()->followings()->attach($follow_user_id);
            UserDatas::byKey('following_count')->byUserId($user_id)->increment('value');
            UserDatas::byKey('followed_count')->byUserId($follow_user_id)->increment('value');

            DB::commit();

            $extras = ['action' => 'follow', 'type' => 'user', 'uid' => $user_id];
            $alert = 'æäººå³æ³¨äºä½ ï¼å»ççå§';
            $alias = $follow_user_id;

            dispatch(new PushMessage($alert, (string) $alias, $extras));

            return response()->json(static::createJsonData([
                'status'  => true,
                'code'    => 0,
                'message' => 'æåå³æ³¨',
            ]))->setStatusCode(201);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json(static::createJsonData([
                'status'  => false,
                'code'    => 1024,
                'message' => 'æä½å¤±è´¥ï¼è¯·ç¨åéè¯',
            ]))->setStatusCode(400);
        }
    }

    /**
     * åæ¶å
     * ³æ³¨.
     *
     * @param [integer] $user_id [è¢«åæ¶å
     * ³æ³¨çç¨æ·ID]
     *
     * @return [type] [description]
     */
    public function doUnFollow(Request $request)
    {
        $user_id = $request->user()->id;
        $follow_user_id = $request->user_id;

        DB::beginTransaction();

        $delete_follow = $request->user()->followings()->detach($follow_user_id);
        $following_count = UserDatas::byKey('following_count')->byUserId($user_id)->decrement('value');
        $followed_count = UserDatas::byKey('followed_count')->byUserId($follow_user_id)->decrement('value');

        if ($delete_follow && $following_count && $followed_count) {
            DB::commit();

            return response()->json(static::createJsonData([
                'status'  => true,
                'code'    => 0,
                'message' => 'æååå³',
            ]))->setStatusCode(204);
        }

        DB::rollBack();

        return response()->json(static::createJsonData([
            'status'  => false,
            'code'    => 1024,
            'message' => 'æä½å¤±è´¥ï¼è¯·ç¨åéè¯',
        ]))->setStatusCode(400);
    }

    /**
     * å
     * ³æ³¨çç¨æ·.
     *
     * @param Request $request [description]
     *
     * @return [type] [description]
     */
    public function follows(Request $request, User $user, int $max_id = 0)
    {
        $limit = $request->input('limit', 15);
        $current_user = $request->user('api');
        $current_user_id = $request->user('api') ?? 0;

        $followings = $user->followings()
            ->where(function ($query) use ($max_id) {
                if ($max_id > 0) {
                    $query->where('user_follow.id', '<', $max_id);
                }
            })
            ->orderBy('user_follow.id', 'DESC')
            ->take($limit)
            ->get();
        $datas['follows'] = [];
        $datas['follows'] = $user->getConnection()->transaction(function () use ($followings, $current_user, $current_user_id) {
            return $followings->map(function ($following) use ($current_user, $current_user_id) {
                return [
                    'id' => $following->pivot->id,
                    'user_id' => $following->pivot->target,
                    'my_follow_status' => $current_user ? $current_user->hasFollwing($following->id) ? 1 : 0 : 0, // å½åç¨æ·å¯¹è¯¥ç¨æ·çå³æ³¨ç¶æ
                    'follow_status' => $following->hasFollwing($current_user_id) ? 1 : 0, // è¯¥ç¨æ·å¯¹å½åç¨æ·çå³æ³¨ç¶æ
                ];
            });
        });

        return response()->json(static::createJsonData([
            'status'  => true,
            'code'    => 0,
            'message' => 'è·åæå',
            'data'    => $datas,
        ]))->setStatusCode(200);
    }

    /**
     * æ¥è¯¢ç²ä¸.
     *
     * @param Request $request [description]
     *
     * @return [type] [description]
     */
    public function followeds(Request $request, User $user, int $max_id = 0)
    {
        $limit = $request->input('limit', 15);
        $current_user = $request->user('api');
        $current_user_id = $request->user('api') ?? 0;

        $followers = $user->followers()
            ->where(function ($query) use ($max_id) {
                if ($max_id > 0) {
                    $query->where('user_follow.id', '<', $max_id);
                }
            })
            ->orderBy('user_follow.id', 'DESC')
            ->take($limit)
            ->get();

        $datas['followeds'] = [];
        $datas['followeds'] = $user->getConnection()->transaction(function () use ($followers, $current_user, $current_user_id) {
            return $followers->map(function ($follower) use ($current_user, $current_user_id) {
                return [
                    'id' => $follower->pivot->id,
                    'user_id' => $follower->pivot->user_id,
                    'my_follow_status' => $current_user ? $current_user->hasFollwing($follower->id) ? 1 : 0 : 0, // å½åç¨æ·å¯¹è¯¥ç¨æ·çå³æ³¨ç¶æ
                    'follow_status' => $follower->hasFollwing($current_user_id) ? 1 : 0, // è¯¥ç¨æ·å¯¹å½åç¨æ·çå³æ³¨ç¶æ
                ];
            });
        });

        return response()->json(static::createJsonData([
            'status'  => true,
            'code'    => 0,
            'message' => 'è·åæå',
            'data'    => $datas,
        ]))->setStatusCode(200);
    }

    /**
     * è·åç¨æ·çå
     * ³æ³¨ç¶æ
     *
     * @author bs<414606094@qq.com>
     *
     * @param Request $request [description]
     *
     * @return [type] [description]
     */
    public function getFollowStatus(Request $request)
    {
        $current_user = $request->user();
        $ids = explode(',', $request->user_ids);
        $data = [];
        if (is_array($ids) && $request->user_ids) {
            $users = User::whereIn('id', $ids)->get();
            $data = $current_user->getConnection()->transaction(function () use ($users, $current_user) {
                return $users->map(function ($user) use ($current_user) {
                    return [
                        'follow_status' => $user->hasFollwing($current_user->id) ? 1 : 0,
                        'my_follow_status' => $current_user->hasFollwing($user->id) ? 1 : 0,
                        'user_id' => $user->id,
                    ];
                });
            });
        }

        return response()->json(static::createJsonData([
            'status'  => true,
            'code'    => 0,
            'message' => 'è·åæå',
            'data'    => $data,
        ]))->setStatusCode(200);
    }

    protected function checkUserFollowData($user_id, $countKey)
    {
        $allowedKey = ['following_count', 'followed_count'];

        if (in_array($countKey, $allowedKey)) {
            $map = ['key' => $countKey, 'user_id' => $user_id];
            $data = ['key' => $countKey, 'user_id' => $user_id, 'value' => 0];

            UserDatas::firstOrCreate($map, $data);
        }

        return true;
    }
}
