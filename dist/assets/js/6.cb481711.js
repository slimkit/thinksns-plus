(window.webpackJsonp=window.webpackJsonp||[]).push([[6],{166:function(t,s,e){"use strict";e.r(s);var a=e(0),n=Object(a.a)({},function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("div",{staticClass:"content"},[t._m(0),t._v(" "),t._m(1),t._v(" "),e("p",[t._v("我们打开"),e("a",{ref:"noopener noreferrer",attrs:{href:"http://www.php.net/downloads.php",target:"_blank",rel:"noopener noreferrer"}},[t._v("PHP 官网下载页"),e("OutboundLink")],1),t._v("找到最新的 PHP 7.2 版本，以 7.2.9 为例：")]),t._v(" "),e("img",{attrs:{src:t.$withBase("/assets/img/guide/installation/php-download-page.png")}}),t._v(" "),t._m(2),t._v(" "),t._m(3),t._v(" "),t._m(4),t._m(5),t._v(" "),t._m(6),e("p",[t._v("等待命令执行完成即可，执行完成后，我们下载 PHP 源码：")]),t._v(" "),t._m(7),e("div",{staticClass:"warning custom-block"},[e("p",{staticClass:"custom-block-title"},[t._v("WARNING")]),t._v(" "),t._m(8),t._v(" "),e("img",{attrs:{src:t.$withBase("/assets/img/guide/installation/php-download-copy-link.png")}}),t._v(" "),e("p",[t._v("复制得到地址后，我们运行下面的命令进行下载：")]),t._v(" "),t._m(9)]),t._v(" "),t._m(10),t._v(" "),e("p",[t._v("解压源码之前，请先下载解压工具：")]),t._v(" "),t._m(11),e("p",[t._v("然后我们先将 XZ 归档解压为 tar 归档：")]),t._v(" "),t._m(12),t._m(13),t._v(" "),t._m(14),t._m(15),t._v(" "),t._m(16),t._v(" "),t._m(17)])},[function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("p",[t._v("本章将会带领你在 "),e("strong",[t._v("CentOS")]),t._v(" "),e("code",[t._v("7.4")]),t._v(" 系统上编译安装 "),e("strong",[t._v("PHP")]),t._v(" "),e("code",[t._v("7.2")]),t._v(" 环境，以及缺少的拓展安装。")])},function(){var t=this.$createElement,s=this._self._c||t;return s("h2",{attrs:{id:"下载源码"}},[s("a",{staticClass:"header-anchor",attrs:{href:"#下载源码","aria-hidden":"true"}},[this._v("#")]),this._v(" 下载源码")])},function(){var t=this.$createElement,s=this._self._c||t;return s("p",[this._v("我们点击"),s("strong",[this._v("绿色")]),this._v("框部分的的地址，最后我们通过选择地区后得到最终地址为："),s("code",[this._v("http://cn2.php.net/distributions/php-7.2.9.tar.xz")])])},function(){var t=this.$createElement,s=this._self._c||t;return s("p",[this._v("我们得到文件下载地址后，登入 Linux，我们现在在服务器下载 PHP 源码，下载我们使用 "),s("strong",[this._v("curl")]),this._v(" 命令下载，检查你的服务器是否有这个命令输入 "),s("code",[this._v("curl --help")]),this._v(" 如果有很大一串内容输出，则表示有该命令，如果输出内容为：")])},function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"language-log line-numbers-mode"},[s("pre",{pre:!0,attrs:{class:"language-text"}},[s("code",[this._v("-bash: curl: command not found\n")])]),this._v(" "),s("div",{staticClass:"line-numbers-wrapper"},[s("span",{staticClass:"line-number"},[this._v("1")]),s("br")])])},function(){var t=this.$createElement,s=this._self._c||t;return s("p",[this._v("那么，我们使用 CentOS 自带的 "),s("code",[this._v("yum")]),this._v(" 命令进行安装：")])},function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"language-bash line-numbers-mode"},[s("pre",{pre:!0,attrs:{class:"language-bash"}},[s("code",[this._v("yum "),s("span",{attrs:{class:"token function"}},[this._v("install")]),this._v(" -y "),s("span",{attrs:{class:"token function"}},[this._v("curl")]),this._v("\n")])]),this._v(" "),s("div",{staticClass:"line-numbers-wrapper"},[s("span",{staticClass:"line-number"},[this._v("1")]),s("br")])])},function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"language-bash line-numbers-mode"},[s("pre",{pre:!0,attrs:{class:"language-bash"}},[s("code",[s("span",{attrs:{class:"token function"}},[this._v("curl")]),this._v(" -o php-7.2.9.tar.xz http://cn2.php.net/distributions/php-7.2.9.tar.xz\n")])]),this._v(" "),s("div",{staticClass:"line-numbers-wrapper"},[s("span",{staticClass:"line-number"},[this._v("1")]),s("br")])])},function(){var t=this,s=t.$createElement,e=t._self._c||s;return e("p",[t._v("如果你无法找到准确的文件下载地址，那么你点击"),e("strong",[t._v("绿色")]),t._v("框的链接，会进入地区选择页面，例如你选择 "),e("code",[t._v("China")]),t._v(" 地区，你会看到一个 "),e("code",[t._v("cn2.php.net")]),t._v(" 的链接，鼠标放上去，「右键」点击「复制链接地址」你粘贴后会得到 "),e("code",[t._v("http://cn2.php.net/get/php-7.2.9.tar.xz/from/this/mirror")]),t._v(" 这样的地址，如图：")])},function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"language-bash line-numbers-mode"},[s("pre",{pre:!0,attrs:{class:"language-bash"}},[s("code",[s("span",{attrs:{class:"token function"}},[this._v("curl")]),this._v(" -L -o php-7.2.9.tar.xz http://cn2.php.net/get/php-7.2.9.tar.xz/from/this/mirror\n")])]),this._v(" "),s("div",{staticClass:"line-numbers-wrapper"},[s("span",{staticClass:"line-number"},[this._v("1")]),s("br")])])},function(){var t=this.$createElement,s=this._self._c||t;return s("h2",{attrs:{id:"解压源码"}},[s("a",{staticClass:"header-anchor",attrs:{href:"#解压源码","aria-hidden":"true"}},[this._v("#")]),this._v(" 解压源码")])},function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"language-bash line-numbers-mode"},[s("pre",{pre:!0,attrs:{class:"language-bash"}},[s("code",[this._v("yum "),s("span",{attrs:{class:"token function"}},[this._v("install")]),this._v(" -y "),s("span",{attrs:{class:"token function"}},[this._v("tar")]),this._v(" xz\n")])]),this._v(" "),s("div",{staticClass:"line-numbers-wrapper"},[s("span",{staticClass:"line-number"},[this._v("1")]),s("br")])])},function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"language-bash line-numbers-mode"},[s("pre",{pre:!0,attrs:{class:"language-bash"}},[s("code",[this._v("xz -d php-7.2.9.tar.xz\n")])]),this._v(" "),s("div",{staticClass:"line-numbers-wrapper"},[s("span",{staticClass:"line-number"},[this._v("1")]),s("br")])])},function(){var t=this.$createElement,s=this._self._c||t;return s("p",[this._v("执行完成后，我们输入 "),s("code",[this._v("ls")]),this._v(" 命令，你会看到现在 "),s("code",[this._v("php-7.2.9.tar.xz")]),this._v(" 文件已经消失，而多出一个 "),s("code",[this._v("php-7.2.9.tar")]),this._v(" 归档。此时我们来解压这个 tar 归档：")])},function(){var t=this.$createElement,s=this._self._c||t;return s("div",{staticClass:"language-bash line-numbers-mode"},[s("pre",{pre:!0,attrs:{class:"language-bash"}},[s("code",[s("span",{attrs:{class:"token function"}},[this._v("tar")]),this._v(" -xvf php-7.2.9.tar\n")])]),this._v(" "),s("div",{staticClass:"line-numbers-wrapper"},[s("span",{staticClass:"line-number"},[this._v("1")]),s("br")])])},function(){var t=this.$createElement,s=this._self._c||t;return s("p",[this._v("解压完成后，运行 "),s("code",[this._v("ls")]),this._v(" 命令会看到，多出一个 "),s("code",[this._v("php-7.2.9")]),this._v(" 的没有了，好了我们现在就得到了源码。")])},function(){var t=this.$createElement,s=this._self._c||t;return s("blockquote",[s("p",[this._v("如果你解压步骤失败，可能是下载的文件不是 "),s("code",[this._v(".tar.xz")]),this._v(" 后缀归档，也有可能是下载过程中数据丢包，不用担心。你重新下运行 "),s("code",[this._v("rm -rf php-7.2.9*")]),this._v(" 命令，将你之前下载的删除，然后重新下载即可。")])])},function(){var t=this.$createElement,s=this._self._c||t;return s("h2",{attrs:{id:"编译-php"}},[s("a",{staticClass:"header-anchor",attrs:{href:"#编译-php","aria-hidden":"true"}},[this._v("#")]),this._v(" 编译 PHP")])}],!1,null,null,null);n.options.__file="build-install-php.md";s.default=n.exports}}]);