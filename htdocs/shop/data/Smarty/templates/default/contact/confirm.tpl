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

<div id="undercolumn">
    <h2 class="title">Inquiry (Confirmation)</h2>
    <div id="undercolumn_contact">
        <p>Would you like send the following form?<br />
            If you want, please crick the button “Send”</p>
        <form name="form1" id="form1" method="post" action="?">
            <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
            <input type="hidden" name="mode" value="complete" />
            <!--{foreach key=key item=item from=$arrForm}-->
                <!--{if $key ne 'mode'}-->
                    <input type="hidden" name="<!--{$key}-->" value="<!--{$item.value|h}-->" />
                <!--{/if}-->
            <!--{/foreach}-->
            <table summary="お問い合わせ内容確認">
                <col width="30%" />
                <col width="70%" />
                <tr>
                    <th>Name</th>
                    <td><!--{$arrForm.name01.value|h}-->　<!--{$arrForm.name02.value|h}--></td>
                </tr>
                <!--<tr>
                    <th>お名前(フリガナ)</th>
                    <td><!--{$arrForm.kana01.value|h}-->　<!--{$arrForm.kana02.value|h}--></td>
                </tr>-->
                <!--<tr>
                    <th>郵便番号</th>
                    <td>
                        <!--{if strlen($arrForm.zip01.value) > 0 && strlen($arrForm.zip02.value) > 0}-->
                            〒<!--{$arrForm.zip01.value|h}-->-<!--{$arrForm.zip02.value|h}-->
                        <!--{/if}-->
                    </td>
                </tr>-->
                <!--<tr>
                    <th>住所</th>
                    <td><!--{$arrPref[$arrForm.pref.value]}--><!--{$arrForm.addr01.value|h}--><!--{$arrForm.addr02.value|h}--></td>
                </tr>-->
                <tr>
                    <th>Phone</th>
                    <td>
                      
                        <!--{if strlen($arrForm.tel01.value) > 0}-->
                            <!--{$arrForm.tel01.value|h}--><!--{$arrForm.tel02.value|h}--><!--{$arrForm.tel03.value|h}-->
                        <!--{/if}-->
                       
                    </td>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <td><a href="mailto:<!--{$arrForm.email.value|escape:'hex'}-->"><!--{$arrForm.email.value|escape:'hexentity'}--></a></td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td><!--{$arrForm.contents.value|h|nl2br}--></td>
                </tr>
            </table>
            <div class="btn_area">
                <ul>
                    <li class="form_btn">
                        <a href="?" onclick="eccube.setModeAndSubmit('return', '', ''); return false;"> <img class="btn_hover" src="/shop/img/btn/return.png" width="100%" alt="戻る" /></a>
                    </li>
                    <li class="form_btn">
                        <input type="image" class="btn_hover" src="/shop/img/btn/send.png" alt="送信" name="send" id="send" width="100%" />
                    </li>
                </ul>
            </div>

        </form>
    </div>
</div>
