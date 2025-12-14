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
<li id="navi-order-upload_csv"
    class="<!--{if $tpl_mainno == 'order' && $tpl_subno == 'upload_csv_b2'}-->on<!--{/if}-->"
    ><a href="<!--{$smarty.const.ROOT_URLPATH}--><!--{$smarty.const.ADMIN_DIR}-->order/plg_expresslink_upload_csv_b2.php"><span>伝票番号CSV登録(B2)</span></a></li>
<!--{/if}-->
<!--{if $smarty.const.plg_ExpressLink_Use_Ehiden2 == 1}-->
<li id="navi-order-upload_csv_eh"
    class="<!--{if $tpl_mainno == 'order' && $tpl_subno == 'upload_csv_eh'}-->on<!--{/if}-->"
    ><a href="<!--{$smarty.const.ROOT_URLPATH}--><!--{$smarty.const.ADMIN_DIR}-->order/plg_expresslink_upload_csv_eh.php"><span>伝票番号CSV登録(e飛伝II)</span></a></li>
<!--{/if}-->
<!--{if $smarty.const.plg_ExpressLink_Use_EhidenPro == 1}-->
<li id="navi-order-upload_csv_eh_pro"
    class="<!--{if $tpl_mainno == 'order' && $tpl_subno == 'upload_csv_eh_pro'}-->on<!--{/if}-->"
    ><a href="<!--{$smarty.const.ROOT_URLPATH}--><!--{$smarty.const.ADMIN_DIR}-->order/plg_expresslink_upload_csv_eh_pro.php"><span>伝票番号CSV登録(e飛伝Pro)</span></a></li>
<!--{/if}-->
<!--{if $smarty.const.plg_ExpressLink_Use_BizLogiDEPO == 1}-->
<li id="navi-order-upload_csv_depo"
    class="<!--{if $tpl_mainno == 'order' && $tpl_subno == 'upload_csv_depo'}-->on<!--{/if}-->"
    ><a href="<!--{$smarty.const.ROOT_URLPATH}--><!--{$smarty.const.ADMIN_DIR}-->order/plg_expresslink_upload_csv_bizlogi_depo.php"><span>伝票番号CSV登録(DEPO)</span></a></li>
<!--{/if}-->
<!--{if $smarty.const.plg_ExpressLink_Use_YuPack4 == 1}-->
<li id="navi-order-upload_csv_yu"
    class="<!--{if $tpl_mainno == 'order' && $tpl_subno == 'upload_csv_yu'}-->on<!--{/if}-->"
    ><a href="<!--{$smarty.const.ROOT_URLPATH}--><!--{$smarty.const.ADMIN_DIR}-->order/plg_expresslink_upload_csv_yu.php"><span>伝票番号CSV登録(ゆうプリ4)</span></a></li>
<!--{/if}-->
<!--{if $smarty.const.plg_ExpressLink_Use_YuPackR == 1}-->
<li id="navi-order-upload_csv_yur"
    class="<!--{if $tpl_mainno == 'order' && $tpl_subno == 'upload_csv_yur'}-->on<!--{/if}-->"
    ><a href="<!--{$smarty.const.ROOT_URLPATH}--><!--{$smarty.const.ADMIN_DIR}-->order/plg_expresslink_upload_csv_yur.php"><span>伝票番号CSV登録(ゆうプリR)</span></a></li>
<!--{/if}-->
<!--{if $smarty.const.plg_ExpressLink_Use_Ebusiness == 1}-->
<li id="navi-order-upload_csv_ebis"
    class="<!--{if $tpl_mainno == 'order' && $tpl_subno == 'upload_csv_ebis'}-->on<!--{/if}-->"
    ><a href="<!--{$smarty.const.ROOT_URLPATH}--><!--{$smarty.const.ADMIN_DIR}-->order/plg_expresslink_upload_csv_ebis.php"><span>伝票番号CSV登録(e発行)</span></a></li>
<!--{/if}-->
<!--{if $smarty.const.plg_ExpressLink_Use_KangarooMagic2 == 1}-->
<li id="navi-order-upload_csv_km2"
    class="<!--{if $tpl_mainno == 'order' && $tpl_subno == 'upload_csv_km2'}-->on<!--{/if}-->"
    ><a href="<!--{$smarty.const.ROOT_URLPATH}--><!--{$smarty.const.ADMIN_DIR}-->order/plg_expresslink_upload_csv_km2.php"><span>伝票番号CSV登録(カンガルー・マジック2)</span></a></li>
<!--{/if}-->
