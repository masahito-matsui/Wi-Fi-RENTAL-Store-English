<!--{*
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2013 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */
*}-->

<section id="mypagecolumn">
    <h2 class="title"><!--{$tpl_title|h}--></h2>
    <!--{include file=$tpl_navi}-->

    <h3 class="title_mypage"><!--{$tpl_subtitle|h}--></h3>

    <div class="form_area">
        <div id="historyBox">
            <p>
                <em>Order number</em>:&nbsp;<!--{$tpl_arrOrderData.order_id}--><br />
                <em>The date of purchase (YYYY/MM/DD)</em>:&nbsp;<!--{$tpl_arrOrderData.create_date|sfDispDBDate}--><br />
                <em>Payment</em>:&nbsp;<!--{$arrPayment[$tpl_arrOrderData.payment_id]|h}-->
            </p>

            <!--<form action="order.php" method="post">
                <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
                <input type="hidden" name="order_id" value="<!--{$tpl_arrOrderData.order_id}-->">
                <input class="btn_reorder btn data-role-none" type="submit" name="submit" value="Reorder">
            </form>-->
        </div>
        <!--{foreach item=shippingItem name=shippingItem from=$arrShipping}-->
            <h3>Delivery Address<!--{if $isMultiple}--><!--{$smarty.foreach.shippingItem.iteration}--><!--{/if}--></h3>
        <div class="historyBox">
        <p>
            <!--{if $isMultiple}-->
                    <!--{foreach item=item from=$shippingItem.shipment_item}-->
                        <em>Item code:&nbsp;</em><!--{$item.productsClass.product_code|h}--><br />
                        <em>Item:&nbsp;</em>
                                <!--{$item.productsClass.name|h}--><br />
                                <!--{if $item.productsClass.classcategory_name1 != ""}-->
                                    <!--{$item.productsClass.class_name1}-->：<!--{$item.productsClass.classcategory_name1}--><br />
                                <!--{/if}-->
                                <!--{if $item.productsClass.classcategory_name2 != ""}-->
                                    <!--{$item.productsClass.class_name2}-->：<!--{$item.productsClass.classcategory_name2}--><br />
                                <!--{/if}-->

                        <em>Unit price:&nbsp;</em>￥<!--{$item.price|sfCalcIncTax:$tpl_arrOrderData.order_tax_rate:$tpl_arrOrderData.order_tax_rule|number_format}--><br />
                        <em>Quantity:&nbsp;</em><!--{$item.quantity}--><br />
                        <!--{* XXX 購入小計と誤差が出るためコメントアウト
                        <em>小計</em><!--{$item.total_inctax|number_format}-->円
                        *}-->
                        <br />
                    <!--{/foreach}-->
            <!--{/if}-->

            <em>Name: </em><!--{$shippingItem.shipping_name01|h}-->&nbsp;<!--{$shippingItem.shipping_name02|h}--><br />
            
            <!--{if false}-->
            
            <em>お名前(フリガナ): </em><!--{$shippingItem.shipping_kana01|h}-->&nbsp;<!--{$shippingItem.shipping_kana02|h}--><br />
            <em>会社名: </em><!--{$shippingItem.shipping_company_name|h}--><br />
            <!--{if $smarty.const.FORM_COUNTRY_ENABLE}-->
                <em>国: </em><!--{$arrCountry[$shippingItem.shipping_country_id]|h}--><br />
                
            <!--{/if}-->
                
                <em>ZIPCODE: </em><!--{$shippingItem.shipping_zipcode|h}--><br />
            <!--{/if}-->
            <em>Zip code: </em><!--{$shippingItem.shipping_zip01}-->-<!--{$shippingItem.shipping_zip02}--><br />
            <em>Address: </em><!--{$arrPref[$shippingItem.shipping_pref]}--><!--{$shippingItem.shipping_addr01|h}--><!--{$shippingItem.shipping_addr02|h}--><br />
            <em>Phone: </em><!--{$shippingItem.shipping_tel01}-->-<!--{$shippingItem.shipping_tel02}-->-<!--{$shippingItem.shipping_tel03}--><br />
                            <!--{if $shippingItem.shipping_fax01 > 0}-->
            <em>FAX番号: </em><!--{$shippingItem.shipping_fax01}-->-<!--{$shippingItem.shipping_fax02}-->-<!--{$shippingItem.shipping_fax03}--><br />
                            <!--{/if}-->
            <em>Delivery date: </em><!--{$shippingItem.shipping_date|default:'指定なし'|h}--><br />
            <em>Delivery time: </em><!--{$shippingItem.shipping_time|default:'指定なし'|h}--><br />
</p>
</div>

        <!--{/foreach}-->

        <div class="formBox">
            <!--▼カートの中の商品一覧 -->
            <div class="cartinarea clearfix">

                <!--▼商品 -->
                <!--{foreach from=$tpl_arrOrderDetail item=orderDetail}-->
                    <div>
                        <img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$orderDetail.main_list_image|sfNoImageMainList|h}-->" style="max-width: 80px;max-height: 80px;" alt="<!--{$orderDetail.product_name|h}-->" class="photoL" />
                        <div class="cartinContents">
                            <div>
                                <p><em><!--→商品名--><a<!--{if $orderDetail.enable}--> href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$orderDetail.product_id|u}-->"<!--{/if}--> rel="external"><!--{$orderDetail.product_name|h}--></a><!--←商品名--></em></p>
                                <p>
                                    <!--→金額-->
                                    <!--{assign var=price value=`$orderDetail.price`}-->
                                    <!--{assign var=quantity value=`$orderDetail.quantity`}-->
                                    <span class="mini">Rental rate: </span><!--{$price|number_format|h}--> JPY<!--←金額-->
                                </p>

                                <!--→商品種別-->
                                <!--{if $orderDetail.product_type_id == $smarty.const.PRODUCT_TYPE_DOWNLOAD}-->
                                    <p id="downloadable">
                                        <!--{if $orderDetail.is_downloadable}-->
                                            <a target="_self" href="<!--{$smarty.const.ROOT_URLPATH}-->mypage/download.php?order_id=<!--{$tpl_arrOrderData.order_id}-->&amp;product_id=<!--{$orderDetail.product_id}-->&amp;product_class_id=<!--{$orderDetail.product_class_id}-->" rel="external">ダウンロード</a><br />
                                        <!--{else}-->
                                            <!--{if $orderDetail.payment_date == "" && $orderDetail.effective == "0"}-->
                                                <!--{$arrProductType[$orderDetail.product_type_id]}--><br />（入金確認中）
                                            <!--{else}-->
                                                <!--{$arrProductType[$orderDetail.product_type_id]}--><br />（期限切れ）
                                            <!--{/if}-->
                                        <!--{/if}-->
                                    </p>
                                <!--{/if}-->
                                <!--←商品種別-->
                            </div>
                            <!--{assign var=tax_rate value=`$orderDetail.tax_rate`}-->
                            <!--{assign var=tax_rule value=`$orderDetail.tax_rule`}-->
                            <ul>
                                <li><span class="mini">Quantity: </span><!--{$quantity|h}--></li>
                                <li class="result"><span class="mini">Subtotal: </span><!--{$price|sfCalcIncTax:$tax_rate:$tax_rule|sfMultiply:$quantity|number_format}--> JPY</li>
                            </ul>
                        </div>
                    </div>
                <!--{/foreach}-->
                <!--▲商品 -->

            </div><!--{* /.cartinarea *}-->
            <!--▲ カートの中の商品一覧 -->

            <div class="total_area">
                <div><span class="mini">Subtotal: </span><!--{$tpl_arrOrderData.subtotal|number_format}--> JPY</div>
                <!--{if $tpl_arrOrderData.use_point > 0}-->
                    <div><span class="mini">Discount(Point): </span>&minus;<!--{$tpl_arrOrderData.use_point|number_format}--> JPY</div>
                <!--{/if}-->
                <!--{if $tpl_arrOrderData.discount != '' && $tpl_arrOrderData.discount > 0}-->
                    <div><span class="mini">Discount: </span>&minus;<!--{$tpl_arrOrderData.discount|number_format}--> JPY</div>
                <!--{/if}-->
                <div><span class="mini">Delivery fee: </span><!--{$tpl_arrOrderData.deliv_fee|number_format}--> JPY</div>
                
                <!--{if false}-->
                <div><span class="mini">手数料: </span><!--{$tpl_arrOrderData.charge|number_format}--> JPY</div>
                <!--{/if}-->
                
                <div><span class="mini">Total amount: </span><span class="price fb"><!--{$tpl_arrOrderData.payment_total|number_format}--></span> JPY</div>
                <div><span class="mini">Earned points: </span><!--{$tpl_arrOrderData.add_point|number_format|default:0}-->Pt</div>
            </div>
        </div><!-- /.formBox -->

<!--{if false}-->
        <!--▼メール一覧 -->
        <div class="formBox">

            <div class="box_header">
                メール配信履歴一覧
            </div>
            <!--{section name=cnt loop=$tpl_arrMailHistory}-->
                <!--▼メール -->
                <div class="arrowBox">
                    <p>配信日：<!--{$tpl_arrMailHistory[cnt].send_date|sfDispDBDate|h}--><br />
                        <!--{assign var=key value="`$tpl_arrMailHistory[cnt].template_id`"}-->
                        通知メール：<!--{$arrMAILTEMPLATE[$key]|h}--></p>
                    <p><a href="javascript:;" onclick="getMailDetail(<!--{$tpl_arrMailHistory[cnt].send_id}-->)" rel="external"><!--{$tpl_arrMailHistory[cnt].subject|h}--></a></p>
                </div>
                <!--▲メール -->
            <!--{/section}-->
        </div><!-- /.formBox -->
        <!--▲メール一覧 -->
<!--{/if}-->

        <p><a rel="external" class="btn_more" href="./<!--{$smarty.const.DIR_INDEX_PATH}-->">Back</a></p>

    </div><!-- /.form_area -->

</section>

<!--{include file= 'frontparts/search_area.tpl'}-->

<script>
    function getMailDetail(send_id) {
        $.mobile.showPageLoadingMsg();
        $.ajax({
            type: "GET",
            url: "<!--{$smarty.const.ROOT_URLPATH}-->mypage/mail_view.php",
            data: "mode=getDetail&send_id=" + send_id,
            cache: false,
            dataType: "json",
            error: function(XMLHttpRequest, textStatus, errorThrown){
                alert(textStatus);
                $.mobile.hidePageLoadingMsg();
            },
            success: function(result){
                var maxCnt = 0;
                $("#windowcolumn h2").text('メール詳細');
                $("#windowcolumn a[data-rel=back]").text('Return(List)');
                $($("#windowcolumn dl.view_detail dt").get(maxCnt)).text(result[0].subject);
                $($("#windowcolumn dl.view_detail dd").get(maxCnt)).html(result[0].mail_body.replace(/\n/g,"<br />"));
                $("#windowcolumn dl.view_detail dd").css('font-family', 'monospace');
                $.mobile.changePage('#windowcolumn', {transition: "slideup"});
                //ダイアログが開き終わるまで待機
                setTimeout( function() {
                                loadingState = 0;
                                $.mobile.hidePageLoadingMsg();
                }, 1000);
            }
        });
    }
</script>
