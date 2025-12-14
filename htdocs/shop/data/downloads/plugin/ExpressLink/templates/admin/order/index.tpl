<!--{*
*
* Plugin Code : ExpressLink
*
* Copyright (C) 2016 BraTech Co., Ltd. All Rights Reserved.
* http://www.bratech.co.jp/
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*
 *}-->

<!--{if $smarty.const.plg_ExpressLink_Use_B2 == 1}-->
<a class="btn-normal" href="javascript:;" onclick="fnModeSubmit('b2csv', '', '');
        return false;">B2 CSVダウンロード</a>
<!--{/if}-->
<!--{if $smarty.const.plg_ExpressLink_Use_Ehiden2 == 1}-->
<a class="btn-normal" href="javascript:;" onclick="fnModeSubmit('ehiden2csv', '', '');
        return false;">e飛伝II CSVダウンロード</a>
<!--{/if}-->
<!--{if $smarty.const.plg_ExpressLink_Use_Ehiden2Mail == 1}-->
<a class="btn-normal" href="javascript:;" onclick="fnModeSubmit('ehiden2mailcsv', '', '');
        return false;">e飛伝II メール便CSVダウンロード</a>
<!--{/if}-->
<!--{if $smarty.const.plg_ExpressLink_Use_EhidenPro == 1}-->
<a class="btn-normal" href="javascript:;" onclick="fnModeSubmit('ehidenprocsv', '', '');
        return false;">e飛伝Pro CSVダウンロード</a>
<!--{/if}-->
<!--{if $smarty.const.plg_ExpressLink_Use_BizLogiDEPO == 1}-->
<a class="btn-normal" href="javascript:;" onclick="fnModeSubmit('bizlogidepocsv', '', '');
        return false;">Biz-Logi DEPO CSVダウンロード</a>
<!--{/if}-->
<!--{if $smarty.const.plg_ExpressLink_Use_YuPack4 == 1}-->
<a class="btn-normal" href="javascript:;" onclick="fnModeSubmit('yu2csv', '', '');
        return false;">ゆうパックプリント4 CSVダウンロード</a>
<!--{/if}-->
<!--{if $smarty.const.plg_ExpressLink_Use_YuPackR == 1}-->
<a class="btn-normal" href="javascript:;" onclick="fnModeSubmit('yur2csv', '', '');
        return false;">ゆうパックプリントR CSVダウンロード</a>
<!--{/if}-->
<!--{if $smarty.const.plg_ExpressLink_Use_Ebusiness == 1}-->
<a class="btn-normal" href="javascript:;" onclick="fnModeSubmit('ebusinesscsv', '', '');
        return false;">e-発行 CSVダウンロード</a>
<!--{/if}-->
<!--{if $smarty.const.plg_ExpressLink_Use_KangarooMagic2 == 1}-->
<a class="btn-normal" href="javascript:;" onclick="fnModeSubmit('km2csv', '', '');
        return false;">カンガルー・マジック2 CSVダウンロード</a>
<!--{/if}-->