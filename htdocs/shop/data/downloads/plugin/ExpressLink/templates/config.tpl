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
<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_header.tpl"}-->


<h2><!--{$tpl_subtitle}--></h2>
<form name="form1" id="form1" method="post" action="<!--{$smarty.server.REQUEST_URI|h}-->">
    <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
    <input type="hidden" name="mode" value="edit">

    <h3>共通設定</h3>
    <table border="0" cellspacing="1" cellpadding="8" summary=" ">
        <col width="30%" />
        <col width="70%" />
        <tr >
            <td bgcolor="#f3f3f3">営業所・郵便局留め機能</td>
            <td>
                <!--{assign var=key value="center_stop"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <!--{html_radios options=$arrCenterStop selected=$arrForm[$key]|default:0 name=$key}-->
                <br>
                ヤマト運輸営業所検索URL:
                <!--{assign var=key value="yamato_center_search_url"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->"><br>
                佐川急便営業所検索URL:
                <!--{assign var=key value="sagawa_center_search_url"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->"><br>
                郵便局検索URL:
                <!--{assign var=key value="post_search_url"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->"><br>
                西濃運輸営業所検索URL:
                <!--{assign var=key value="seino_search_url"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->"><br>
            </td>
        </tr>
        <tr >
            <td bgcolor="#f3f3f3">代引き設定<br><span style="font-size:10px; color:#0000FF;">ここで設定した支払方法の受注情報については、CSV出力時に代引き金額などが挿入されます。</span></td>
            <td>
                <!--{assign var=key value="cod_id"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <!--{html_checkboxes options=$arrPayments name=$key selected=$arrForm[$key] separator="<br>"}-->
            </td>
        </tr>
        <tr >
            <td bgcolor="#f3f3f3">依頼主設定<br><span style="font-size:10px; color:#0000FF;">依頼主情報として出力する内容を「購入者情報」もしくは「ショップ情報」から選択します。</span></td>
            <td>
                <!--{assign var=key value="order_type"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <!--{html_radios options=$arrOrderType name=$key selected=$arrForm[$key]|default:0 separator='<br />'}-->
            </td>
        </tr>
        <tr >
            <td bgcolor="#f3f3f3">CSV出力設定<br><span style="font-size:10px; color:#0000FF;">CSV出力時に出力内容を「"」で囲むように設定します。ラベル発行ソフトに取り込まれる際にうまく取り込まれない場合にお試しください。</span></td>
            <td>
                <p>CSV出力内容に</p>
                <!--{assign var=key value="csv_quote"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <!--{html_radios options=$arrCSVQuote name=$key selected=$arrForm[$key]|default:0 separator='<br />'}-->
            </td>
        </tr>
        <tr >
            <td bgcolor="#f3f3f3">品名設定<br></td>
            <td>
                <p>品名項目設定</p>
                <!--{assign var=key value="product_all"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <!--{html_radios options=$arrProductDisp name=$key selected=$arrForm[$key]|default:0 separator='<br />'}--><span style="font-size:10px; color:#0000FF;">品名２～５までの項目にも商品名を表示するかどうかを指定します。</span><br><br>
                <!--{assign var=key value="productnum_flg"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <p>商品数の印字:</p>
                <!--{html_radios options=$arrPrintFlg name=$key selected=$arrForm[$key]|default:2 separator='<br />'}--><br>
                <p>商品名を固定にする場合の商品名：</p>
                <!--{assign var=key value="product_name"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->"><br>
                <span style="font-size:10px; color:#0000FF;">「雑貨」や「衣料品」など品名を固定にされたい場合にご入力ください。空白の場合は商品名が表示されます。<br>品名項目設定で"品名項目全てに出力"を選んだ場合、この設定は機能しません。</span>
            </td>
        </tr>
        <tr >
            <td bgcolor="#f3f3f3">記事欄設定<br><span style="font-size:10px; color:#0000FF;">記事欄に受注情報の備考（お問い合わせ内容）を印字するかどうかを設定します</span></td>
            <td>
                <p>記事欄に備考内容を</p>
                <!--{assign var=key value="print_message"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <!--{html_radios options=$arrPrintFlg name=$key selected=$arrForm[$key]|default:2 separator='<br />'}-->
                [※Biz-Logi DEPO, カンガルー・マジックIIのみ]<br>
                <!--{assign var=key value="print_type"}-->
                <input type="checkbox" name="<!--{$key}-->" value="1" <!--{if $arrForm[$key] == 1}-->checked<!--{/if}-->>記事欄に備考の代わりに商品名を出力する

            </td>
        </tr>
        <tr >
            <td bgcolor="#f3f3f3">お届け日の取り込み</td>
            <td>
                <!--{assign var=key value="yamato_import_shipping_date"}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <!--{html_options options=$arrImport selected=$arrForm[$key]|default:0 name=$key}-->
            </td>
        </tr>
        <tr >
            <td bgcolor="#f3f3f3">クール・冷凍便連動機能</td>
            <td>
                <!--{assign var=key value="delivcool_comb"}-->
                <!--{if $deliv_cool_enable == 1}-->
                <span class="attention"><!--{$arrErr[$key]}--></span>
                <!--{html_options options=$arrCenterStop selected=$arrForm[$key]|default:0 name=$key}-->
                <!--{else}-->
                <span style="font-size:10px; color:#0000FF;">弊社の「クール便・冷凍便対応プラグイン」を導入する事でクール便・冷凍便関連の項目を受注内容に応じて出力出来るようになります</span>
                <input type="hidden" name="<!--{$key}-->" value="0">
                <!--{/if}-->
            </td>
        </tr>
    </table>
    <br>
    <br>
    <h3>クロネコヤマト設定</h3>
    <!--{assign var=key value="use_b2"}-->
    <span class="attention"><!--{$arrErr[$key]}--></span>
    <!--{html_radios name=$key options=$arrCenterStop selected=$arrForm[$key]|default:0}--><br><br>
    <div id="block_b2" style="display:<!--{if $arrForm[$key] == 1}-->block<!--{else}-->none<!--{/if}-->;">

        <table border="0" cellspacing="1" cellpadding="8" summary=" ">
            <col width="30%" />
            <col width="70%" />
            <tr >
                <td bgcolor="#f3f3f3">配送設定方法</td>
                <td>
                    配送方法の設定を行う際にクロネコヤマトの配送方法のお届け時間は以下のように設定してください。<br>
                    時間帯が合っていれば表記はどのような表記でも構いません。<br><br>
                    お届け時間１：午前中<br>
                    お届け時間２：14～16時<br>
                    お届け時間３：16～18時<br>
                    お届け時間４：18～20時<br>
                    お届け時間５：19～21時<br>
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">フォーマット設定</td>
                <td>
                    <!--{assign var=key value="yamato_output_flg"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrOutputFlg selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">ご請求先顧客コード</td>
                <td>
                    <!--{assign var=key value="yamato_owner_code"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">ご請求先分類コード</td>
                <td>
                    <!--{assign var=key value="yamato_class_code"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">運賃管理番号</td>
                <td>
                    <!--{assign var=key value="yamato_cost_code"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">&nbsp;例）01
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">敬称</td>
                <td>
                    <!--{assign var=key value="yamato_compellation"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">&nbsp;例）様、御中、行き
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">クール区分</td>
                <td>
                    <!--{assign var=key value="yamato_cool_type"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrCoolType selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">荷扱い１</td>
                <td>
                    <!--{assign var=key value="yamato_handling1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">&nbsp;例）天地無用、水濡厳禁、角落厳禁
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">荷扱い２</td>
                <td>
                    <!--{assign var=key value="yamato_handling2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">&nbsp;例）天地無用、水濡厳禁、角落厳禁
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">発行枚数</td>
                <td>
                    <!--{assign var=key value="yamato_publish_num"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">個数口枠の印字</td>
                <td>
                    <!--{assign var=key value="yamato_print_flg"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrPrintFlg selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">送り状種類設定</td>
                <td>
                    <p style="color:#0000FF;">ここで設定されない配送方法については全て通常便扱いとなります。通常便以外をご指定されたい場合にご利用ください。</p><br />
                    [DM便]<br>
                    <!--{assign var=key value="yamato_mail"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes options=$arrDelivs selected=$arrForm[$key] name=$key}--><br /><br />
                    [タイムサービス]<br>
                    <!--{assign var=key value="yamato_timeservice"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes options=$arrDelivs selected=$arrForm[$key] name=$key}--><br /><br />
                    [メール便速達サービス]<br>
                    <!--{assign var=key value="yamato_express_mail"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes options=$arrDelivs selected=$arrForm[$key] name=$key}--><br /><br />
                    [ネコポス]<br>
                    <!--{assign var=key value="yamato_necopos"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes options=$arrDelivs selected=$arrForm[$key] name=$key}--><br /><br />

                    [宅急便コンパクト]<br>
                    <!--{assign var=key value="yamato_compact"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes options=$arrDelivs selected=$arrForm[$key] name=$key}--><br>
                </td>
            </tr>
        </table>
    </div>

    <h3>佐川急便設定</h3>
    <!--{assign var=key value="use_ehiden2"}-->
    [e飛伝II 宅急便]<br>
    <span class="attention"><!--{$arrErr[$key]}--></span>
    <!--{html_radios name=$key options=$arrCenterStop selected=$arrForm[$key]|default:0}--><br><br>
    <!--{assign var=key value="use_ehiden2mail"}-->
    [e飛伝II メール便]<br>
    <span class="attention"><!--{$arrErr[$key]}--></span>
    <!--{html_radios name=$key options=$arrCenterStop selected=$arrForm[$key]|default:0}--><br><br>
    <!--{assign var=key value="use_ehidenpro"}-->
    [e飛伝Pro]<br>
    <span class="attention"><!--{$arrErr[$key]}--></span>
    <!--{html_radios name=$key options=$arrCenterStop selected=$arrForm[$key]|default:0}--><br><br>

    <!--{assign var=key value="use_bizlogidepo"}-->
    [Biz-Logi DEPO]<br>
    <span class="attention"><!--{$arrErr[$key]}--></span>
    <!--{html_radios name=$key options=$arrCenterStop selected=$arrForm[$key]|default:0}--><br><br>

    <div id="block_ehiden2" style="display:block;">

        <table border="0" cellspacing="1" cellpadding="8" summary=" ">
            <col width="30%" />
            <col width="70%" />
            <tr >
                <td bgcolor="#f3f3f3">配送設定方法</td>
                <td>
                    配送方法の設定を行う際に佐川急便の配送方法のお届け時間は以下のように設定してください。<br>
                    時間帯が合っていれば表記はどのような表記でも構いません。<br><br>
                    「５時間帯」の場合<br>
                    お届け時間１：午前中<br>
                    お届け時間２：12～14時<br>
                    お届け時間３：14～16時<br>
                    お届け時間４：16～18時<br>
                    お届け時間５：18～21時<br><br>
                    「６時間帯」の場合<br>
                    お届け時間１：午前中<br>
                    お届け時間２：12～14時<br>
                    お届け時間３：14～16時<br>
                    お届け時間４：16～18時<br>
                    お届け時間５：18～20時<br>
                    お届け時間６：19～21時<br>
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">配達指定時間帯設定</td>
                <td>
                    <!--{assign var=key value="sagawa_shipping_time"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSagawaShippingTime selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">お客様コード</td>
                <td>
                    <!--{assign var=key value="sagawa_owner_code"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">部署コード(※Proのみ)</td>
                <td>
                    <!--{assign var=key value="sagawa_dept_code"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">部署・担当者</td>
                <td>
                    <!--{assign var=key value="sagawa_dept"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">荷送人電話番号</td>
                <td>
                    <!--{assign var=key value="sagawa_owner_tel"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">荷姿コード</td>
                <td>
                    <!--{assign var=key value="sagawa_packaging_code"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrPackagingCode selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">便種設定</td>
                <td>
                    <p style="color:#0000FF;">ここで設定されない配送方法については全て飛脚宅急便扱いとなります。宅急便以外をご指定されたい場合にご利用ください。</p><br />
                    [飛脚スーパー便]<br>
                    <!--{assign var=key value="sagawa_super"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes options=$arrDelivs selected=$arrForm[$key] name=$key}--><br><br />
                    [飛脚即配便]<br>
                    <!--{assign var=key value="sagawa_express"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes options=$arrDelivs selected=$arrForm[$key] name=$key}--><br><br />
                    [飛脚航空便]<br>
                    <!--{assign var=key value="sagawa_air"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes options=$arrDelivs selected=$arrForm[$key] name=$key}--><br /><br />
                    [飛脚ジャストタイム便]<br>
                    <!--{assign var=key value="sagawa_justtime"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes options=$arrDelivs selected=$arrForm[$key] name=$key}--><br />
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">便種（商品）</td>
                <td>
                    <!--{assign var=key value="sagawa_product_type"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrProductType selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">eコレクト設定</td>
                <td>
                    <!--{assign var=key value="sagawa_ecorect"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrEcorect selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">e飛伝Pro取込フォーマット設定(※Proのみ)</td>
                <td>
                    <!--{assign var=key value="sagawa_pro_format"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrEhidenProFormatType selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
        </table>
    </div>

    <h3>ゆうパックプリント設定</h3>
    <h4>ゆうパックプリントv4設定</h4>
    <!--{assign var=key value="use_yupack4"}-->
    <span class="attention"><!--{$arrErr[$key]}--></span>
    <!--{html_radios name=$key options=$arrCenterStop selected=$arrForm[$key]|default:0}--><br><br>
    <div id="block_yupack4" style="display:<!--{if $arrForm[$key] == 1}-->block<!--{else}-->none<!--{/if}-->;">

        <table border="0" cellspacing="1" cellpadding="8" summary=" ">
            <col width="30%" />
            <col width="70%" />
            <tr >
                <td bgcolor="#f3f3f3">配送設定方法</td>
                <td>
                    配送方法の設定を行う際にゆうパックの配送方法のお届け時間は以下のように設定してください。<br>
                    時間帯が合っていれば表記はどのような表記でも構いません。<br><br>
                    「５区分」の場合<br>
                    お届け時間１：午前<br>
                    お届け時間２：午後１<br>
                    お届け時間３：午後２<br>
                    お届け時間４：夕方<br>
                    お届け時間５：夜間<br><br>
                    「６区分」の場合<br>
                    お届け時間１：午前中<br>
                    お届け時間２：12～14時<br>
                    お届け時間３：14～16時<br>
                    お届け時間４：16～18時<br>
                    お届け時間５：18～20時<br>
                    お届け時間６：20～21時<br>
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">配達指定時間帯設定</td>
                <td>
                    <!--{assign var=key value="yu_shipping_time"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrYuShippingTime selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">サイズ</td>
                <td>
                    <!--{assign var=key value="yu_size"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">&nbsp;例）60
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">お届け先敬称</td>
                <td>
                    <!--{assign var=key value="yu_compellation"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">&nbsp;例）様、御中、行き
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">ご依頼主敬称</td>
                <td>
                    <!--{assign var=key value="yu_compellation2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">&nbsp;例）様、御中、行き
                </td>
            </tr>
        </table>
    </div>

    <h4>ゆうパックプリントR設定</h4>
    <!--{assign var=key value="use_yupackr"}-->
    <span class="attention"><!--{$arrErr[$key]}--></span>
    <!--{html_radios name=$key options=$arrCenterStop selected=$arrForm[$key]|default:0}--><br><br>
    <div id="block_yupackr" style="display:<!--{if $arrForm[$key] == 1}-->block<!--{else}-->none<!--{/if}-->;">

        <table border="0" cellspacing="1" cellpadding="8" summary=" ">
            <col width="30%" />
            <col width="70%" />
            <tr >
                <td bgcolor="#f3f3f3">配送設定方法</td>
                <td>
                    配送方法の設定を行う際にゆうパックの配送方法のお届け時間は以下のように設定してください。<br>
                    時間帯が合っていれば表記はどのような表記でも構いません。<br><br>
                    「３区分」の場合<br>
                    お届け時間１：8～12時<br>
                    お届け時間２：12～17時<br>
                    お届け時間３：17～21時<br>
                    「６区分」の場合<br>
                    お届け時間１：午前中<br>
                    お届け時間２：12～14時<br>
                    お届け時間３：14～16時<br>
                    お届け時間４：16～18時<br>
                    お届け時間５：18～20時<br>
                    お届け時間６：20～21時<br>
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">配達指定時間帯設定</td>
                <td>
                    <!--{assign var=key value="yur_shipping_time"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrYuRShippingTime selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">お届け先敬称</td>
                <td>
                    <!--{assign var=key value="yur_compellation"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrCompellation selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">ご依頼主敬称</td>
                <td>
                    <!--{assign var=key value="yur_compellation2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrCompellation selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">サイズ</td>
                <td>
                    <!--{assign var=key value="yur_size"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSize selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">郵便種別設定</td>
                <td>
                    <p style="color:#0000FF;">ここで設定されない配送方法については全てゆうパック扱いとなります。ゆうパック以外をご指定されたい場合にご利用ください。</p><br />
                    [ゆうメール]<br>
                    <!--{assign var=key value="yur_mail"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes options=$arrDelivs selected=$arrForm[$key] name=$key}--><br>
                    [通常(定型)]<br>
                    <!--{assign var=key value="yur_definite"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes options=$arrDelivs selected=$arrForm[$key] name=$key}--><br>
                    [通常(定型外)]<br>
                    <!--{assign var=key value="yur_nodefinite"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes options=$arrDelivs selected=$arrForm[$key] name=$key}--><br>
                    [ポスパケット]<br>
                    <!--{assign var=key value="yur_packet"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes options=$arrDelivs selected=$arrForm[$key] name=$key}--><br>
                    [宛名ラベル]<br>
                    <!--{assign var=key value="yur_label"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes options=$arrDelivs selected=$arrForm[$key] name=$key}--><br>
                    [ゆうパケット]<br>
                    <!--{assign var=key value="yur_yupacket"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_checkboxes options=$arrDelivs selected=$arrForm[$key] name=$key}--><br>
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">送り状種別<br><span style="font-size:10px; color:#0000FF;">ゆうプリRで"使用する"に設定したラベルを選択して下さい。それ以外のラベルを指定すると取り込み時にエラーとなります。</span></td>
                <td>
                    [ゆうパック]
                    <p>元払時</p>
                    <!--{assign var=key value="yur_send_type1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType1 selected=$arrForm[$key] name=$key}--><br>
                    <p>代引時</p>
                    <!--{assign var=key value="yur_send_type2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType2 selected=$arrForm[$key] name=$key}--><br><br>
                    [ゆうメール]
                    <p>元払時</p>
                    <!--{assign var=key value="yur_mail_send_type1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType1 selected=$arrForm[$key] name=$key}--><br>
                    <p>代引時</p>
                    <!--{assign var=key value="yur_mail_send_type2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType2 selected=$arrForm[$key] name=$key}--><br /><br />
                    [通常（定型）]
                    <p>元払時</p>
                    <!--{assign var=key value="yur_definite_send_type1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType1 selected=$arrForm[$key] name=$key}--><br>
                    <p>代引時</p>
                    <!--{assign var=key value="yur_definite_send_type2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType2 selected=$arrForm[$key] name=$key}--><br /><br />
                    [通常（定型外）]
                    <p>元払時</p>
                    <!--{assign var=key value="yur_nodefinite_send_type1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType1 selected=$arrForm[$key] name=$key}--><br>
                    <p>代引時</p>
                    <!--{assign var=key value="yur_nodefinite_send_type2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType2 selected=$arrForm[$key] name=$key}--><br /><br />
                    [ポスパケット]<br />
                    <!--{assign var=key value="yur_packet_send_type1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType1 selected=$arrForm[$key] name=$key}--><br><br />
                    [宛名ラベル]
                    <p>元払時</p>
                    <!--{assign var=key value="yur_label_send_type1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType1 selected=$arrForm[$key] name=$key}--><br>
                    <p>代引時</p>
                    <!--{assign var=key value="yur_label_send_type2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType2 selected=$arrForm[$key] name=$key}--><br /><br />
                    [配時指定（定型）]
                    <p>元払時</p>
                    <!--{assign var=key value="yur_time_definite_send_type1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType1 selected=$arrForm[$key] name=$key}--><br>
                    <p>代引時</p>
                    <!--{assign var=key value="yur_time_definite_send_type2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType2 selected=$arrForm[$key] name=$key}--><br /><br />
                    [配時指定（定型外）]
                    <p>元払時</p>
                    <!--{assign var=key value="yur_time_nodefinite_send_type1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType1 selected=$arrForm[$key] name=$key}--><br>
                    <p>代引時</p>
                    <!--{assign var=key value="yur_time_nodefinite_send_type2"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType2 selected=$arrForm[$key] name=$key}--><br /><br />
                    [ゆうパケット]<br />
                    <!--{assign var=key value="yur_yupacket_send_type1"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrSendType1 selected=$arrForm[$key] name=$key}--><br />
                </td>
            </tr>
        </table>
    </div>

    <h3>e-発行business設定</h3>
    <!--{assign var=key value="use_ebusiness"}-->
    <span class="attention"><!--{$arrErr[$key]}--></span>
    <!--{html_radios name=$key options=$arrCenterStop selected=$arrForm[$key]|default:0}--><br><br>
    <div id="block_ebusiness" style="display:<!--{if $arrForm[$key] == 1}-->block<!--{else}-->none<!--{/if}-->;">

        <table border="0" cellspacing="1" cellpadding="8" summary=" ">
            <col width="30%" />
            <col width="70%" />
            <tr >
                <td bgcolor="#f3f3f3">サイズ</td>
                <td>
                    <!--{assign var=key value="ebusiness_size"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">
                </td>
            </tr>
        </table>
    </div>

    <h3>カンガルー・マジックII設定</h3>
    <!--{assign var=key value="use_km2"}-->
    <span class="attention"><!--{$arrErr[$key]}--></span>
    <!--{html_radios name=$key options=$arrCenterStop selected=$arrForm[$key]|default:0}--><br><br>
    <div id="block_km2" style="display:<!--{if $arrForm[$key] == 1}-->block<!--{else}-->none<!--{/if}-->;">

        <table border="0" cellspacing="1" cellpadding="8" summary=" ">
            <col width="30%" />
            <col width="70%" />
            <tr >
                <td bgcolor="#f3f3f3">配送設定方法</td>
                <td>
                    配送方法の設定を行う際に西濃運輸の配送方法のお届け時間は以下のように設定してください。<br>
                    時間帯が合っていれば表記はどのような表記でも構いません。<br><br>
                    「通販便」以外の場合<br>
                    お届け時間１：午前<br>
                    お届け時間２：午後<br><br>
                    「通販便」の場合<br>
                    お届け時間１：9～12時<br>
                    お届け時間２：12～17時<br>
                    お届け時間３：17～20時<br>
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">荷送人コード</td>
                <td>
                    <!--{assign var=key value="km2_owner_code"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">部署コード</td>
                <td>
                    <!--{assign var=key value="km2_dept_code"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">部署名</td>
                <td>
                    <!--{assign var=key value="km2_dept_name"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <input type="text" name="<!--{$key}-->" value="<!--{$arrForm[$key]|h}-->">
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">原票区分</td>
                <td>
                    <!--{assign var=key value="km2_send_type"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <!--{html_options options=$arrKM2SendType selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">代引出力設定</td>
                <td>
                    <!--{assign var=key value="km2_cod_output"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <span>品代金・消費税欄の金額を</span>
                    <!--{html_options options=$arrKM2Output selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
            <tr >
                <td bgcolor="#f3f3f3">取込フォーマット設定</td>
                <td>
                    <!--{assign var=key value="km2_cod_input"}-->
                    <span class="attention"><!--{$arrErr[$key]}--></span>
                    <span>取込フォーマットに品代金・消費税欄を</span>
                    <!--{html_options options=$arrKM2Input selected=$arrForm[$key] name=$key}-->
                </td>
            </tr>
        </table>
    </div>

    <div class="btn-area">
        <ul>
            <li>
                <a class="btn-action" href="javascript:;" onclick="document.form1.submit();
                        return false;"><span class="btn-next">この内容で登録する</span></a>
            </li>
        </ul>
    </div>

</form>

<script type="text/javascript">
    $('input[name=use_b2]:radio').change(function () {
        value = $(this).val();
        if (value == 1) {
            $("#block_b2").css("display", "block");
        } else {
            $("#block_b2").css("display", "none");
        }
    });

    $('input[name=use_yupack4]:radio').change(function () {
        value = $(this).val();
        if (value == 1) {
            $("#block_yupack4").css("display", "block");
        } else {
            $("#block_yupack4").css("display", "none");
        }
    });

    $('input[name=use_yupackr]:radio').change(function () {
        value = $(this).val();
        if (value == 1) {
            $("#block_yupackr").css("display", "block");
        } else {
            $("#block_yupackr").css("display", "none");
        }
    });

    $('input[name=use_ebusiness]:radio').change(function () {
        value = $(this).val();
        if (value == 1) {
            $("#block_ebusiness").css("display", "block");
        } else {
            $("#block_ebusiness").css("display", "none");
        }
    });

    $('input[name=use_km2]:radio').change(function () {
        value = $(this).val();
        if (value == 1) {
            $("#block_km2").css("display", "block");
        } else {
            $("#block_km2").css("display", "none");
        }
    });
</script>

<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_footer.tpl"}-->
