<!--{*
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
 *}-->
<style>
#header_login_area{
display: none;
}
</style>

<span id="a8sales"></span>
<script src="//statics.a8.net/a8sales/a8sales.js"></script>
<script>
a8sales({
"pid": "s00000019043001",
"order_number": "<!--{$arrOrder.order_id}-->",
"currency": "JPY",
"items": [
{
"code": "{$arrOrderDetail[cnt].product_code}",
"price": {$arrOrderDetail[cnt].price|sfCalcIncTax:$arrOrderDetail[cnt].tax_rate:$arrOrderDetail[cnt].tax_rule|number_format},
"quantity": {$arrOrderDetail[cnt].quantity}
},
],
"total_price": {$arrOrder.payment_total|number_format|default:0}
});
</script>

<div id="undercolumn">
    <div id="undercolumn_shopping">
        <p class="flow_area">
            <img src="<!--{$TPL_URLPATH}-->img/picture/img_flow_05.jpg" alt="購入手続きの流れ" />
        </p>
        <h2 class="title">Order Complete</h2>

            <p>Order Number: <!--{$smarty.session.order_id}-->
            </p>

        <!-- ▼その他決済情報を表示する場合は表示 -->
        <!--{if $arrOther.title.value}-->
            <p><!--{foreach key=key item=item from=$arrOther}-->
                    <!--{if $key != "title"}-->
                        <!--{if $item.name != ""}-->
                            Approval Number: 
                        <!--{/if}-->
                            <!--{$item.value|nl2br}--><br />
                    <!--{/if}-->
                <!--{/foreach}-->
            </p>
        <!--{/if}-->
        <!-- ▲コンビに決済の場合には表示 -->

        <div id="complete_area">
            <!--<p class="message"><!--{$arrInfo.shop_name|h}-->の商品をご購入いただき、ありがとうございました。</p>
            <p>ただいま、ご注文の確認メールをお送りさせていただきました。<br />
                万一、ご確認メールが届かない場合は、トラブルの可能性もありますので大変お手数ではございますがもう一度お問い合わせいただくか、お電話にてお問い合わせくださいませ。<br />
                今後ともご愛顧賜りますようよろしくお願い申し上げます。</p>-->
　　　　<p>We have just sent you an order confirmation email to you.<br>
Please review the order details, and inform us of any inaccuracies as soon as possible.<br>
<br>
If you don't receive our email, please kindly contact us with your order number.<br>
<br>
Thank you!</p>

            <div class="shop_information">
                <p class="name"><!--{$arrInfo.shop_name|h}--></p>
                <p>TEL：<!--{$arrInfo.tel01}-->-<!--{$arrInfo.tel02}-->-<!--{$arrInfo.tel03}--> <!--<!--{if $arrInfo.business_hour != ""}-->（受付時間/<!--{$arrInfo.business_hour}-->）--><!--{/if}--><br />
                E-mail：<a href="mailto:<!--{$arrInfo.email02|escape:'hex'}-->"><!--{$arrInfo.email02|escape:'hexentity'}--></a>
                </p>
            </div>
        </div>

        <div class="btn_area">
            <ul>
                <li class="form_btn">
                    <a href="/">
                        <img class="btn_hover" src="/shop/img/btn/top.png" width="100%" alt="トップページへ" />
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>