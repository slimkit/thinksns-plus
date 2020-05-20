<?php

declare(strict_types=1);

/*
 * +----------------------------------------------------------------------+
 * |                          ThinkSNS Plus                               |
 * +----------------------------------------------------------------------+
 * | Copyright (c) 2016-Present ZhiYiChuangXiang Technology Co., Ltd.     |
 * +----------------------------------------------------------------------+
 * | This source file is subject to enterprise private license, that is   |
 * | bundled with this package in the file LICENSE, and is available      |
 * | through the world-wide-web at the following url:                     |
 * | https://github.com/slimkit/plus/blob/master/LICENSE                  |
 * +----------------------------------------------------------------------+
 * | Author: Slim Kit Group <master@zhiyicx.com>                          |
 * | Homepage: www.thinksns.com                                           |
 * +----------------------------------------------------------------------+
 */

namespace Zhiyi\Plus\Admin\Controllers\FileStorage;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use function Zhiyi\Plus\setting;

class PublicChannel
{
    /**
     * Get public channel settings.
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(): JsonResponse
    {
        $configure = setting('file-storage', 'channels.public', []);
        $result = [
            'filesystem' => $configure['filesystem'] ?? '',
        ];

        return new JsonResponse($result, Response::HTTP_OK);
    }

    /**
     * Update public channel settings.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request): Response
    {
        $filesystem = $request->input('filesystem');
        if (! in_array($filesystem, ['local', 'AliyunOSS'])) {
            throw new UnprocessableEntityHttpException('选择的文件系统不受支持');
        }

        $setting = setting('file-storage');
        $setting->set('channels.public', [
            'filesystem' => $filesystem,
        ]);

        return new Response('', Response::HTTP_NO_CONTENT);
    }
}
