<?php

/*
* Plugin Code : ExpressLink
*
* Copyright (C) 2016 BraTech Co., Ltd. All Rights Reserved.
* http://www.bratech.co.jp/
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/

// {{{ requires
require_once CLASS_EX_REALDIR . 'page_extends/admin/LC_Page_Admin_Ex.php';
require_once PLUGIN_UPLOAD_REALDIR . "ExpressLink/plg_ExpressLink_Utils.php";

/**
 * 運送会社連携の設定クラス
 *
 * @package ExpressLink
 * @author Bratech CO.,LTD.
 * @version $Id: $
 */
class LC_Page_Plugin_ExpressLink_Config extends LC_Page_Admin_Ex
{

    var $arrForm = array();

    /**
     * 初期化する.
     *
     * @return void
     */
    function init()
    {
        parent::init();
        $this->tpl_mainpage = PLUGIN_UPLOAD_REALDIR . "ExpressLink/templates/config.tpl";
        $this->tpl_subtitle = "運送会社連携設定";

        $this->arrPayments = SC_Helper_DB_Ex::sfGetIDValueList('dtb_payment', 'payment_id', 'payment_method');
    }

    /**
     * プロセス.
     *
     * @return void
     */
    function process()
    {
        $this->action();
        $this->sendResponse();
    }

    /**
     * Page のアクション.
     *
     * @return void
     */
    function action()
    {
        $this->arrUseApp = array();
        $this->arrUseApp[1] = 'クロネコヤマト B2';
        $this->arrUseApp[2] = '佐川急便 e飛伝II';
        $this->arrUseApp[3] = '日本郵便 ゆうパックプリントver.4';

        $this->arrCenterStop = array();
        $this->arrCenterStop[0] = "使用しない";
        $this->arrCenterStop[1] = "使用する";

        $this->arrOutputFlg = array();
        $this->arrOutputFlg[0] = "B2パッケージ版完全フォーマット(ver.6)";
        $this->arrOutputFlg[4] = "B2パッケージ版完全フォーマット(ver.7,新:97項目)";
        $this->arrOutputFlg[3] = "B2パッケージ版完全フォーマット(ver.7,旧:95項目)";
        $this->arrOutputFlg[1] = "簡易出力（運賃管理番号以降を削除）";
        $this->arrOutputFlg[2] = "B2web版フォーマット";

        $this->arrCoolType = array();
        $this->arrCoolType[0] = "通常";
        $this->arrCoolType[1] = "クール冷凍";
        $this->arrCoolType[2] = "クール冷蔵";

        $this->arrPrintFlg = array();
        $this->arrPrintFlg[1] = "印字する";
        $this->arrPrintFlg[2] = "印字しない";

        $this->arrSagawaShippingTime = array();
        $this->arrSagawaShippingTime[0] = "５時間帯";
        $this->arrSagawaShippingTime[1] = "６時間帯";

        $this->arrPackagingCode = array();
        $this->arrPackagingCode[''] = "設定なし";
        $this->arrPackagingCode['001'] = "箱類";
        $this->arrPackagingCode['002'] = "バッグ類";
        $this->arrPackagingCode['003'] = "スーツケース";
        $this->arrPackagingCode['004'] = "封筒類";
        $this->arrPackagingCode['005'] = "ゴルフバッグ";
        $this->arrPackagingCode['006'] = "スキー";
        $this->arrPackagingCode['007'] = "スノーボード";
        $this->arrPackagingCode['008'] = "その他";

        $this->arrSpeedType = array();
        $this->arrSpeedType['000'] = "飛脚宅急便";
        $this->arrSpeedType['001'] = "飛脚スーパー便";
        $this->arrSpeedType['002'] = "飛脚即配便";
        $this->arrSpeedType['003'] = "飛脚航空便（翌日中配達）";
        $this->arrSpeedType['004'] = "飛脚航空便（翌日午前中配達）";
        $this->arrSpeedType['005'] = "飛脚ジャストタイム便";

        $this->arrProductType = array();
        $this->arrProductType['001'] = "指定なし";
        $this->arrProductType['002'] = "飛脚クール便（冷蔵）";
        $this->arrProductType['003'] = "飛脚クール便（冷凍）";

        $this->arrYuShippingTime = array();
        $this->arrYuShippingTime[0] = "５区分";
        $this->arrYuShippingTime[1] = "６区分";

        $this->arrYuRShippingTime = array();
        $this->arrYuRShippingTime[0] = "３区分";
        $this->arrYuRShippingTime[1] = "６区分";

        $this->arrOrderType = array();
        $this->arrOrderType[0] = "購入者情報";
        $this->arrOrderType[1] = "ショップ情報";
        $this->arrOrderType[2] = "購入者情報と届け先情報が違う場合に購入者情報";

        $this->arrCSVQuote = array();
        $this->arrCSVQuote[0] = '「"」をつけない';
        $this->arrCSVQuote[1] = '「"」をつける';

        $this->arrProductDisp = array();
        $this->arrProductDisp[0] = '品名１のみ出力';
        $this->arrProductDisp[1] = '品名項目全てに出力';

        $this->arrEcorect = array();
        $this->arrEcorect[0] = '設定しない';
        $this->arrEcorect[1] = 'eコレクト（現金決済）';
        $this->arrEcorect[2] = 'eコレクト（デビット／クレジット決済）';
        $this->arrEcorect[3] = 'eコレクト（なんでも決済）';

        $this->arrImport = array();
        $this->arrImport[0] = '取り込まない';
        $this->arrImport[1] = '取り込む';

        $this->arrCompellation = array();
        $this->arrCompellation[''] = '設定なし';
        $this->arrCompellation[0] = '様';
        $this->arrCompellation[1] = '殿';
        $this->arrCompellation[2] = '御中';
        $this->arrCompellation[3] = '行';
        $this->arrCompellation[4] = '係';
        $this->arrCompellation[5] = '宛';

        $this->arrSize = array();
        $this->arrSize[''] = '設定なし';
        $this->arrSize['060'] = '60サイズ';
        $this->arrSize['080'] = '80サイズ';
        $this->arrSize['100'] = '100サイズ';
        $this->arrSize['120'] = '120サイズ';
        $this->arrSize['140'] = '140サイズ';
        $this->arrSize['160'] = '160サイズ';
        $this->arrSize['170'] = '170サイズ';

        $this->arrDelivType = array();
        $this->arrDelivType[''] = '設定なし';
        $this->arrDelivType[0] = 'ゆうパック';
        $this->arrDelivType[1] = 'ゆうメール';
        $this->arrDelivType[2] = '通常（定型）';
        $this->arrDelivType[3] = '通常（定型外）';
        $this->arrDelivType[4] = 'ポスパケット';
        $this->arrDelivType[5] = '宛名ラベル';

        $this->arrSendType1 = array();
        $this->arrSendType1[''] = '出力しない';
        $this->arrSendType1['1100300'] = '配達時間帯指定郵便ラベル（普通）[ュ00300]';
        $this->arrSendType1['1100310'] = '配達時間帯指定郵便ラベル（書留）[ュ00310]';
        $this->arrSendType1['1100570'] = 'ゆうパックサーマル（共用・L版）[ュ00572]';
        $this->arrSendType1['1100571'] = 'ゆうパックサーマル（元払・L版）[ュ00573]';
        $this->arrSendType1['1100661'] = 'ゆうパックラベル（元払B）[ュ00661]';
        $this->arrSendType1['1100701'] = 'ゆうパックラベル（B）[ュ00701]';
        $this->arrSendType1['1100706'] = 'ゆうパックラベル（B2）[ュ00706]';
        $this->arrSendType1['1100725'] = 'セキュリティゆうパックラベル[ュ00725]';
        $this->arrSendType1['1100780'] = 'ゆうパックシート（A4・2宛分）[ュ00780]';
        $this->arrSendType1['1100782'] = 'ゆうパックシートはがき付（A4）[ュ00782]';
        $this->arrSendType1['1100783001'] = 'ゆうパックシート無地（A4・2宛分）[ュ00783]';
        $this->arrSendType1['1100784'] = 'ゆうパックシート（A4・3宛分）[ュ00784]';
        $this->arrSendType1['1100785'] = 'ゆうパックシート（A5）[ュ00785]';
        $this->arrSendType1['1100800'] = 'ポスパケット用あて名シー[ュ00800]';
        $this->arrSendType1['1150651'] = 'ゆうパックラベル（元払A）[ュ00651]';
        $this->arrSendType1['7P02R08001'] = 'ゆうメールタックシール[ュ00582]';
        $this->arrSendType1['7P02R08002'] = 'ゆうメールサーマルラベル[ュ00585]';
        $this->arrSendType1['1800800001'] = 'ゆうパケットタックシール[ュ00582]';
        $this->arrSendType1['1800800012'] = 'ゆうパケットサーマルラベル[ュ00585]';


        $this->arrSendType2 = array();
        $this->arrSendType2[''] = '出力しない';
        $this->arrSendType2['1100271'] = '代引郵便ラベル（電信）[ュ00272]';
        $this->arrSendType2['1100272'] = '代引郵便ラベル（通常・電信）[ュ00271]';
        $this->arrSendType2['1100273'] = '代引書留郵便ラベル（電信）[ュ00274]';
        $this->arrSendType2['1100274'] = '代引書留郵便ラベル（通常・電信）[ュ00273]';
        $this->arrSendType2['1100275'] = '（新）代引郵便ラベル（通常・電信）[ュ00275]';
        $this->arrSendType2['1100276'] = '（新）代引書留郵便ラベル（通常・電信）[ュ00276]';
        $this->arrSendType2['1100422'] = '代引シート（一般・通常）[ュ00422]';
        $this->arrSendType2['1100424'] = '（新）代引シート（一般・通常）[ュ00424]';
        $this->arrSendType2['1100740'] = '（旧）代引ゆうパックラベル（一般・通常[ュ00740]）';
        $this->arrSendType2['1100740001'] = '代引ゆうパックラベル（一般・通常）[ュ00740]';
        $this->arrSendType2['1100741'] = '代引ゆうパックラベル（一般・電信）[ュ00741]';
        $this->arrSendType2['1100742'] = '（新）代引ゆうパックラベル（一般・通常）[ュ00742]';
        $this->arrSendType2['1100747'] = 'ゆうパック代引まとめシート（A4・2宛分）[ュ00747]';
        $this->arrSendType2['1100747001'] = 'ゆうメール代引まとめシート（A4・2宛分）[ュ00747]';
        $this->arrSendType2['1100748'] = 'ゆうパック代引まとめシート（A5）[ュ00748]';
        $this->arrSendType2['1100748001'] = 'ゆうメール代引まとめシート（A5）[ュ00748]';
        $this->arrSendType2['1100783003'] = '代引まとめゆうパックシート無地（A4・2宛分）[ュ00783]';
        $this->arrSendType2['1150740'] = '代引ゆうパックラベル（まとめ送金）[ュ00745]';
        $this->arrSendType2 = $this->arrSendType2 + $this->arrSendType1;

        $this->arrEhidenProFormatType[0] = '全項目';
        $this->arrEhidenProFormatType[1] = '重量制項目を除外したフォーマット';

        $this->arrKM2SendType = array();
        $this->arrKM2SendType['0'] = "一般";
        $this->arrKM2SendType['1'] = "宅配";
        $this->arrKM2SendType['3'] = "ミニ";
        $this->arrKM2SendType['9'] = "ビジネス便";
        $this->arrKM2SendType['8'] = "通販便";

        $this->arrKM2Output = array();
        $this->arrKM2Output['0'] = "出力しない";
        $this->arrKM2Output['1'] = "出力する";

        $this->arrKM2Input = array();
        $this->arrKM2Input['0'] = "含めない";
        $this->arrKM2Input['1'] = "含める";


        $this->arrDelivs = SC_Helper_DB_Ex::sfGetIDValueList('dtb_deliv', 'deliv_id', 'service_name', 'del_flg = 0 AND product_type_id <> ?', array(PRODUCT_TYPE_DOWNLOAD));


        $this->deliv_cool_enable = plg_ExpressLink_Utils::checkEnableDelivCoolPlugin();

        $arrCheckbox = array("cod_id", "yur_pack", "yur_mail", "yur_definite", "yur_nodefinite", "yur_packet", "yur_label", "yur_time_definite", "yur_time_nodefinite", "yur_yupacket", "yamato_mail", "yamato_timeservice", "yamato_express_mail", "yamato_nacopos", "sagawa_super", "sagawa_express", "sagawa_air", "sagawa_justtime");

        $objFormParam = new SC_FormParam_Ex();
        $this->lfInitParam($objFormParam);
        $objFormParam->setParam($_POST);
        $objFormParam->convParam();

        $arrForm = array();

        switch ($this->getMode()) {
            case 'edit':
                $arrForm = $objFormParam->getHashArray();
                $this->arrErr = $objFormParam->checkError();
                // エラーなしの場合にはデータを更新
                if (count($this->arrErr) == 0) {
                    // データ更新
                    $this->updateData($arrForm);
                    if (count($this->arrErr) == 0) {
                        $this->tpl_onload = "alert('登録が完了しました。');";
                        $this->tpl_onload .= 'window.close();';
                    }
                }
                break;
            default:
                break;
        }
        if (empty($arrForm)) {
            $objQuery = & SC_Query_Ex::getSingletonInstance();
            $ret = $objQuery->select("*", "plg_expresslink_config");
            foreach ($ret as $item) {
                if (in_array($item['name'], $arrCheckbox)) {
                    $arrForm[$item['name']] = explode(',', $item['value']);
                } else {
                    $arrForm[$item['name']] = $item['value'];
                }
            }
        }
        $this->arrForm = $arrForm;
        $this->setTemplate($this->tpl_mainpage);
    }

    /**
     * デストラクタ.
     *
     * @return void
     */
    function destroy()
    {
        if (method_exists('LC_Page_Admin_Ex', 'destroy')) {
            parent::destroy();
        }
    }

    /**
     * パラメーター情報の初期化
     *
     * @param object $objFormParam SC_FormParamインスタンス
     * @return void
     */
    function lfInitParam(&$objFormParam)
    {
        $objFormParam->addParam('営業所止め', 'center_stop', INT_LEN, '', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('代引きID', 'cod_id', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));

        $objFormParam->addParam('出力項目設定', 'yamato_output_flg', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('ご請求先顧客コード', 'yamato_owner_code', 12, 'a', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('ご請求先分類コード', 'yamato_class_code', 3, 'a', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('運賃管理番号', 'yamato_cost_code', 2, 'a', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('敬称', 'yamato_compellation', 2, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('クール区分', 'yamato_cool_type', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('荷扱い１', 'yamato_handling1', 10, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('荷扱い２', 'yamato_handling2', 10, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('発行枚数', 'yamato_publish_num', 2, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('個数口枠の印字', 'yamato_print_flg', INT_LEN, '', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));

        $objFormParam->addParam('配達指定時間帯設定', 'sagawa_shipping_time', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('お客様コード', 'sagawa_owner_code', 12, 'a', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('部署コード', 'sagawa_dept_code', 12, 'a', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('部署・担当者', 'sagawa_dept', 16, 'KVA', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('荷送人電話番号', 'sagawa_owner_tel', 14, 'a', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('荷姿コード', 'sagawa_packaging_code', INT_LEN, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('便種（スピード）', 'sagawa_speed_type', INT_LEN, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('便種（商品）', 'sagawa_product_type', INT_LEN, '', array('MAX_LENGTH_CHECK'));

        $objFormParam->addParam('配達指定時間帯設定', 'yu_shipping_time', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('お届け先敬称', 'yu_compellation', 2, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('ご依頼主敬称', 'yu_compellation2', 2, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('サイズ', 'yu_size', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('依頼主設定', 'order_type', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('CSV出力設定', 'csv_quote', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('B2使用', 'use_b2', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('e飛伝II使用', 'use_ehiden2', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('e飛伝IIメール便使用', 'use_ehiden2mail', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('e飛伝Pro使用', 'use_ehidenpro', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('ゆうパックプリントv4使用', 'use_yupack4', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('商品項目使用', 'product_all', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('商品数表示', 'productnum_flg', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('品名', 'product_name', 25, 'KVa', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('eコレクト設定', 'sagawa_ecorect', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('お届け予定日の取り込み', 'yamato_import_shipping_date', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('e-business発行使用', 'use_ebusiness', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('サイズ', 'ebusiness_size', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('記事欄設定', 'print_message', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('記事欄出力設定', 'print_type', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('ゆうパックプリントR使用', 'use_yupackr', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('配達指定時間帯設定', 'yur_shipping_time', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('お届け先敬称', 'yur_compellation', INT_LEN, '', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('ご依頼主敬称', 'yur_compellation2', INT_LEN, '', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('サイズ', 'yur_size', INT_LEN, '', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('送り状種別(ゆうパック元払時)', 'yur_send_type1', 20, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('送り状種別(ゆうパック代引時)', 'yur_send_type2', 20, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('送り状種別(ゆうメール元払時)', 'yur_mail_send_type1', 20, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('送り状種別(ゆうメール代引時)', 'yur_mail_send_type2', 20, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('送り状種別(定型元払時)', 'yur_definite_send_type1', 20, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('送り状種別(定型代引時)', 'yur_definite_send_type2', 20, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('送り状種別(定型外元払時)', 'yur_nodefinite_send_type1', 20, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('送り状種別(定型外代引時)', 'yur_nodefinite_send_type2', 20, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('送り状種別(ポスパケット元払時)', 'yur_packet_send_type1', 20, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('送り状種別(ラベル元払時)', 'yur_label_send_type1', 20, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('送り状種別(ラベル代引時)', 'yur_label_send_type2', 20, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('送り状種別(配時指定定型元払時)', 'yur_time_definite_send_type1', 20, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('送り状種別(配時指定定型代引時)', 'yur_time_definite_send_type2', 20, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('送り状種別(配時指定定型外元払時)', 'yur_time_nodefinite_send_type1', 20, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('送り状種別(配時指定定型外代引時)', 'yur_time_nodefinite_send_type2', 20, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('送り状種別(ゆうパケット元払時)', 'yur_yupacket_send_type1', 20, '', array('MAX_LENGTH_CHECK'));

        $objFormParam->addParam('クール便連動機能', 'delivcool_comb', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('ヤマト運輸営業所検索URL', 'yamato_center_search_url', URL_LEN, 'KVa', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('佐川急便営業所検索URL', 'sagawa_center_search_url', URL_LEN, 'KVa', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('郵便局検索URL', 'post_search_url', URL_LEN, 'KVa', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('西濃運輸営業所検索URL', 'seino_search_url', URL_LEN, 'KVa', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('e飛伝Pro取込フォーマット', 'sagawa_pro_format', INT_LEN, 'n', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('Biz-Logi DEPO使用', 'use_bizlogidepo', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('カンガルー・マジック2使用', 'use_km2', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('荷送人コード', 'km2_owner_code', 11, 'a', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('原票区分', 'km2_send_type', INT_LEN, '', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('部署コード', 'km2_dept_code', 2, 'a', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('部署名', 'km2_dept_name', 15, 'KVA', array('MAX_LENGTH_CHECK'));
        $objFormParam->addParam('代引出力設定', 'km2_cod_output', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('取込フォーマット設定', 'km2_cod_input', INT_LEN, 'n', array('MAX_LENGTH_CHECK', 'NUM_CHECK'));
        $objFormParam->addParam('郵便種別（ゆうパック）', 'yur_pack', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('郵便種別（ゆうメール）', 'yur_mail', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('郵便種別（定型）', 'yur_definite', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('郵便種別（定型外）', 'yur_nodefinite', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('郵便種別（ポスパケット）', 'yur_packet', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('郵便種別（宛名ラベル）', 'yur_label', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('郵便種別（配時指定定型）', 'yur_time_definite', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('郵便種別（配時指定定型外）', 'yur_time_nodefinite', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('郵便種別（ゆうパケット）', 'yur_yupacket', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('DM便設定', 'yamato_mail', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('タイムサービス', 'yamato_timeservice', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('メール便速達サービス', 'yamato_express_mail', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('ネコポス', 'yamato_necopos', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('宅急便コンパクト', 'yamato_compact', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('便種設定（飛脚スーパー便）', 'sagawa_super', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('便種設定（飛脚即配便）', 'sagawa_express', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('便種設定（飛脚航空便）', 'sagawa_air', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
        $objFormParam->addParam('便種設定（ジャストタイム便）', 'sagawa_justtime', INT_LEN, 'n', array('NUM_CHECK', 'MAX_LENGTH_CHECK'));
    }

    function updateData($arrData)
    {
        $arrCSV = array("yamato_send_type", "yamato_cool_type", "yamato_compellation", "yamato_owner_code", "yamato_class_code", "yamato_publish_num", "yamato_print_flg", "yamato_cost_code", "yamato_handling1", "yamato_handling2", "sagawa_dept", "sagawa_owner_tel", "sagawa_packaging_code", "sagawa_product_type", "sagawa_owner_code", "sagawa_dept_code", "yu_compellation", "yu_compellation2", "yu_size", 'ebusiness_size', "yur_compellation", "yur_compellation2", "yur_size", "km2_owner_code", "km2_dept_code", "km2_dept_name", "km2_send_type");
        $objQuery = & SC_Query_Ex::getSingletonInstance();
        foreach ($arrData as $key => $value) {
            $objQuery->delete("plg_expresslink_config", "name = ?", array($key));
            $sqlval = array();
            $sqlval['name'] = $key;
            if (is_array($value))
                $value = implode(',', $value);
            $sqlval['value'] = $value;
            $objQuery->insert("plg_expresslink_config", $sqlval);

            if (in_array($key, $arrCSV)) {
                $no = $objQuery->get($key . "_no", "plg_expresslink_config_no", "id=1");
                $objQuery->update("dtb_csv", array("col" => "('" . $value . "') as " . $key), "no = ?", array($no));
            }
            if ($key == "sagawa_owner_code") {
                $no = $objQuery->get("sagawa_owner_code_mail_no", "plg_expresslink_config_no", "id=1");
                $objQuery->update("dtb_csv", array("col" => "('" . $value . "') as D" . $no), "no = ?", array($no));
                $no = $objQuery->get("sagawa_owner_code_pro_no", "plg_expresslink_config_no", "id=1");
                $objQuery->update("dtb_csv", array("col" => "('" . $value . "') as D" . $no), "no = ?", array($no));
                $no = $objQuery->get("sagawa_owner_code_bizlogi_no", "plg_expresslink_config_no", "id=1");
                $objQuery->update("dtb_csv", array("col" => "('" . $value . "') as D" . $no), "no = ?", array($no));
                if ($arrData["order_type"] == 1) {
                    $no = $objQuery->get("sagawa_agent_code_no", "plg_expresslink_config_no", "id=1");
                    $objQuery->update("dtb_csv", array("col" => "('" . $value . "') as D" . $no), "no = ?", array($no));
                }
            } elseif ($key == "sagawa_dept") {
                $no = $objQuery->get("sagawa_dept_pro_no", "plg_expresslink_config_no", "id=1");
                $objQuery->update("dtb_csv", array("col" => "('" . $value . "') as D" . $no), "no = ?", array($no));
            } elseif ($key == "sagawa_owner_tel") {
                $no = $objQuery->get("sagawa_order_tel_pro_no", "plg_expresslink_config_no", "id=1");
                $objQuery->update("dtb_csv", array("col" => "('" . $value . "') as D" . $no), "no = ?", array($no));
            } elseif ($key == "sagawa_product_type") {
                $no = $objQuery->get("sagawa_product_type_pro_no", "plg_expresslink_config_no", "id=1");
                $objQuery->update("dtb_csv", array("col" => "('" . (intval($value) - 1) . "') as D" . $no), "no = ?", array($no));
            }
        }

        //出力項目設定
        $no = $objQuery->get("yamato_cost_code_no", "plg_expresslink_config_no", "id=1");
        if ($arrData["yamato_output_flg"] == 1) {
            $objQuery->update("dtb_csv", array("status" => 0), "csv_id = 11 AND no > ?", array($no));
        } else {
            $objQuery->update("dtb_csv", array("status" => 1), "csv_id = 11 AND no > ?", array($no));
        }

        //品名設定
        $no1 = $objQuery->get("yamato_productname1_no", "plg_expresslink_config_no", "id=1");
        $no2 = $objQuery->get("yamato_productname2_no", "plg_expresslink_config_no", "id=1");
        $no3 = $objQuery->get("sagawa_productname1_no", "plg_expresslink_config_no", "id=1");
        $no4 = $objQuery->get("sagawa_productname2_no", "plg_expresslink_config_no", "id=1");
        $no5 = $objQuery->get("sagawa_productname3_no", "plg_expresslink_config_no", "id=1");
        $no6 = $objQuery->get("sagawa_productname4_no", "plg_expresslink_config_no", "id=1");
        $no7 = $objQuery->get("sagawa_productname5_no", "plg_expresslink_config_no", "id=1");
        $no8 = $objQuery->get("yu_productname_no", "plg_expresslink_config_no", "id=1");
        $no9 = $objQuery->get("ebusiness_productname1_no", "plg_expresslink_config_no", "id=1");
        $no10 = $objQuery->get("ebusiness_productname2_no", "plg_expresslink_config_no", "id=1");
        $no11 = $objQuery->get("ebusiness_productname3_no", "plg_expresslink_config_no", "id=1");
        $no12 = $objQuery->get("yur_product_id_no", "plg_expresslink_config_no", "id=1");
        $no13 = $objQuery->get("yur_productname_no", "plg_expresslink_config_no", "id=1");
        $no14 = $objQuery->get("yur_productquantity_no", "plg_expresslink_config_no", "id=1");



        if (plg_ExpressLink_Utils::getECCUBEVer() >= 2130) {
            if ($arrData["productnum_flg"] == 1) {
                $product_name = "product_name || ' x' || quantity";
                $value14 = "(select quantity from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1)";
            } else {
                $product_name = "product_name";
                $value14 = "NULL";
            }

            $value1 = $value8 = $value9 = "(select " . $product_name . " from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1)";
            $value13 = "(select product_name from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1)";
            $value3 = $depovalue1 = "substring((select " . $product_name . " from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1) from 1 for 16)";
            $value12 = "(select dtb_order_detail.product_id from dtb_shipment_item LEFT JOIN dtb_order_detail ON dtb_shipment_item.product_class_id = dtb_order_detail.product_class_id where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1)";
            $km2value1 = "substring((select " . $product_name . " from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1) from 1 for 15)";
        } else {
            if ($arrData["productnum_flg"] == 1) {
                $product_name = "product_name || ' x' || quantity";
                $value14 = "(select quantity from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1)";
            } else {
                $product_name = "product_name";
                $value14 = "NULL";
            }

            $value1 = $value8 = $value9 = "(select " . $product_name . " from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1)";
            $value13 = "(select product_name from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1)";
            $value3 = $depovalue1 = "substring((select " . $product_name . " from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1) from 1 for 16)";
            $value12 = "(select product_id from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1)";
            $km2value1 = "substring((select " . $product_name . " from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1) from 1 for 15)";
        }

        if ($arrData["product_all"] == 1) {
            if (plg_ExpressLink_Utils::getECCUBEVer() >= 2130) {
                $value2 = "(case when (select count(*) from dtb_shipment_item where order_id = dtb_order.order_id AND shipping_id = dtb_shipping.shipping_id) > 1 then (select " . $product_name . " from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1 offset 1) else NULL end)";
                $value4 = $depovalue2 = "(case when (select count(*) as cnt from dtb_shipment_item where order_id = dtb_order.order_id AND shipping_id = dtb_shipping.shipping_id) > 1 then substring((select " . $product_name . " from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1 offset 1) from 1 for 16) else NULL end)";
                $value5 = $depovalue3 = "(case when (select count(*) as cnt from dtb_shipment_item where order_id = dtb_order.order_id AND shipping_id = dtb_shipping.shipping_id) > 2 then substring((select " . $product_name . " from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1 offset 2) from 1 for 16) else NULL end)";
                $value6 = $depovalue4 = "(case when (select count(*) as cnt from dtb_shipment_item where order_id = dtb_order.order_id AND shipping_id = dtb_shipping.shipping_id) > 3 then substring((select " . $product_name . " from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1 offset 3) from 1 for 16) else NULL end)";
                $value7 = $depovalue5 = "(case when (select count(*) as cnt from dtb_shipment_item where order_id = dtb_order.order_id AND shipping_id = dtb_shipping.shipping_id) > 4 then substring((select " . $product_name . " from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1 offset 4) from 1 for 16) else NULL end)";
                $value10 = "(case when (select count(*) as cnt from dtb_shipment_item where order_id = dtb_order.order_id AND shipping_id = dtb_shipping.shipping_id) > 1 then (select " . $product_name . " from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1 offset 1) else NULL end)";
                $value11 = "(case when (select count(*) as cnt from dtb_shipment_item where order_id = dtb_order.order_id AND shipping_id = dtb_shipping.shipping_id) > 2 then (select " . $product_name . " from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1 offset 2) else NULL end)";
                $depovalue6 = "(case when (select count(*) as cnt from dtb_shipment_item where order_id = dtb_order.order_id AND shipping_id = dtb_shipping.shipping_id) > 5 then substring((select " . $product_name . " from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1 offset 5) from 1 for 16) else NULL end)";
                $km2value2 = "(case when (select count(*) as cnt from dtb_shipment_item where order_id = dtb_order.order_id AND shipping_id = dtb_shipping.shipping_id) > 1 then substring((select " . $product_name . " from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1 offset 1) from 1 for 15) else NULL end)";
                $km2value3 = "(case when (select count(*) as cnt from dtb_shipment_item where order_id = dtb_order.order_id AND shipping_id = dtb_shipping.shipping_id) > 2 then substring((select " . $product_name . " from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1 offset 2) from 1 for 15) else NULL end)";
                $km2value4 = "(case when (select count(*) as cnt from dtb_shipment_item where order_id = dtb_order.order_id AND shipping_id = dtb_shipping.shipping_id) > 3 then substring((select " . $product_name . " from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1 offset 3) from 1 for 15) else NULL end)";
                $km2value5 = "(case when (select count(*) as cnt from dtb_shipment_item where order_id = dtb_order.order_id AND shipping_id = dtb_shipping.shipping_id) > 4 then substring((select " . $product_name . " from dtb_shipment_item where dtb_shipment_item.order_id = dtb_shipping.order_id AND dtb_shipment_item.shipping_id = dtb_shipping.shipping_id limit 1 offset 4) from 1 for 15) else NULL end)";
            } else {
                $value2 = "(case when (select count(order_detail_id) from dtb_order_detail where order_id = dtb_order.order_id) > 1 then (select " . $product_name . " from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1 offset 1) else NULL end)";
                $value4 = $depovalue2 = "(case when (select count(order_detail_id) as cnt from dtb_order_detail where order_id = dtb_order.order_id) > 1 then substring((select " . $product_name . " from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1 offset 1) from 1 for 16) else NULL end)";
                $value5 = $depovalue3 = "(case when (select count(order_detail_id) as cnt from dtb_order_detail where order_id = dtb_order.order_id) > 2 then substring((select " . $product_name . " from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1 offset 2) from 1 for 16) else NULL end)";
                $value6 = $depovalue4 = "(case when (select count(order_detail_id) as cnt from dtb_order_detail where order_id = dtb_order.order_id) > 3 then substring((select " . $product_name . " from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1 offset 3) from 1 for 16) else NULL end)";
                $value7 = $depovalue5 = "(case when (select count(order_detail_id) as cnt from dtb_order_detail where order_id = dtb_order.order_id) > 4 then substring((select " . $product_name . " from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1 offset 4) from 1 for 16) else NULL end)";
                $value10 = "(case when (select count(order_detail_id) as cnt from dtb_order_detail where order_id = dtb_order.order_id) > 1 then (select " . $product_name . " from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1 offset 1) else NULL end)";
                $value11 = "(case when (select count(order_detail_id) as cnt from dtb_order_detail where order_id = dtb_order.order_id) > 2 then (select " . $product_name . " from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1 offset 2) else NULL end)";
                $depovalue6 = "(case when (select count(order_detail_id) as cnt from dtb_order_detail where order_id = dtb_order.order_id) > 5 then substring((select " . $product_name . " from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1 offset 5) from 1 for 16) else NULL end)";
                $km2value2 = "(case when (select count(order_detail_id) as cnt from dtb_order_detail where order_id = dtb_order.order_id) > 1 then substring((select " . $product_name . " from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1 offset 1) from 1 for 15) else NULL end)";
                $km2value3 = "(case when (select count(order_detail_id) as cnt from dtb_order_detail where order_id = dtb_order.order_id) > 2 then substring((select " . $product_name . " from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1 offset 2) from 1 for 15) else NULL end)";
                $km2value4 = "(case when (select count(order_detail_id) as cnt from dtb_order_detail where order_id = dtb_order.order_id) > 3 then substring((select " . $product_name . " from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1 offset 3) from 1 for 15) else NULL end)";
                $km2value5 = "(case when (select count(order_detail_id) as cnt from dtb_order_detail where order_id = dtb_order.order_id) > 4 then substring((select " . $product_name . " from dtb_order_detail where dtb_order_detail.order_id = dtb_shipping.order_id order by dtb_order_detail.order_detail_id limit 1 offset 4) from 1 for 15) else NULL end)";
            }
        } else {
            if (strlen($arrData['product_name']) > 0) {
                $value1 = $value8 = $value9 = $value13 = "('" . $arrData['product_name'] . "')";
                $value3 = $depovalue1 = "('" . mb_substr($arrData['product_name'], 0, 16) . "')";
                $value12 = "NULL";
                $value14 = "NULL";
                $km2value1 = "('" . mb_substr($arrData['product_name'], 0, 15) . "')";
            }
            $value2 = "NULL";
            $value4 = "NULL";
            $value5 = "NULL";
            $value6 = "NULL";
            $value7 = "NULL";
            $value10 = "NULL";
            $value11 = "NULL";
            $value12 = "NULL";
            $value14 = "NULL";
            $depovalue2 = $depovalue3 = $depovalue4 = $depovalue5 = $depovalue6 = "NULL";
            $km2value2 = $km2value3 = $km2value4 = $km2value5 = "NULL";
        }

        $objQuery->update("dtb_csv", array("col" => $value1 . " as D" . $no1), "no = ?", array($no1));
        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no2), "no = ?", array($no2));
        $objQuery->update("dtb_csv", array("col" => $value3 . " as sagawa_productname1"), "no = ?", array($no3));
        $objQuery->update("dtb_csv", array("col" => $value4 . " as sagawa_productname2"), "no = ?", array($no4));
        $objQuery->update("dtb_csv", array("col" => $value5 . " as sagawa_productname3"), "no = ?", array($no5));
        $objQuery->update("dtb_csv", array("col" => $value6 . " as sagawa_productname4"), "no = ?", array($no6));
        $objQuery->update("dtb_csv", array("col" => $value7 . " as sagawa_productname5"), "no = ?", array($no7));
        $objQuery->update("dtb_csv", array("col" => $value8 . " as D" . $no8), "no = ?", array($no8));
        $objQuery->update("dtb_csv", array("col" => $value9 . " as D" . $no9), "no = ?", array($no9));
        $objQuery->update("dtb_csv", array("col" => $value10 . " as D" . $no10), "no = ?", array($no10));
        $objQuery->update("dtb_csv", array("col" => $value11 . " as D" . $no11), "no = ?", array($no11));
        $objQuery->update("dtb_csv", array("col" => $value12 . " as D" . $no12), "no = ?", array($no12));
        $objQuery->update("dtb_csv", array("col" => $value13 . " as D" . $no13), "no = ?", array($no13));
        $objQuery->update("dtb_csv", array("col" => $value14 . " as D" . $no14), "no = ?", array($no14));

        //記事欄設定
        $no1 = $objQuery->get("yamato_message_no", "plg_expresslink_config_no", "id=1");
        $no2 = $objQuery->get("ebusiness_message_no", "plg_expresslink_config_no", "id=1");
        $no3 = $objQuery->get("yur_article_no", "plg_expresslink_config_no", "id=1");
        $depono1 = $objQuery->get("sagawa_article1_bizlogi_no", "plg_expresslink_config_no", "id=1");
        $depono2 = $objQuery->get("sagawa_article2_bizlogi_no", "plg_expresslink_config_no", "id=1");
        $depono3 = $objQuery->get("sagawa_article3_bizlogi_no", "plg_expresslink_config_no", "id=1");
        $depono4 = $objQuery->get("sagawa_article4_bizlogi_no", "plg_expresslink_config_no", "id=1");
        $depono5 = $objQuery->get("sagawa_article5_bizlogi_no", "plg_expresslink_config_no", "id=1");
        $depono6 = $objQuery->get("sagawa_article6_bizlogi_no", "plg_expresslink_config_no", "id=1");
        $km2no1 = $objQuery->get("km2_article1_no", "plg_expresslink_config_no", "id=1");
        $km2no2 = $objQuery->get("km2_article2_no", "plg_expresslink_config_no", "id=1");
        $km2no3 = $objQuery->get("km2_article3_no", "plg_expresslink_config_no", "id=1");
        $km2no4 = $objQuery->get("km2_article4_no", "plg_expresslink_config_no", "id=1");
        $km2no5 = $objQuery->get("km2_article5_no", "plg_expresslink_config_no", "id=1");

        if ($arrData["print_type"] != 1) {
            $depovalue1 = "substring(message from 1 for 16)";
            $depovalue2 = "substring(message from 17 for 16)";
            $depovalue3 = "substring(message from 33 for 16)";
            $depovalue4 = "substring(message from 49 for 16)";
            $depovalue5 = "substring(message from 65 for 16)";
            $depovalue6 = "substring(message from 81 for 16)";
            $km2value1 = "substring(message from 1 for 15)";
            $km2value2 = "substring(message from 16 for 15)";
            $km2value3 = "substring(message from 31 for 15)";
            $km2value4 = "substring(message from 46 for 15)";
            $km2value5 = "substring(message from 61 for 15)";
        }

        if ($arrData["print_message"] == 1) {
            $objQuery->update("dtb_csv", array("col" => "message as D" . $no1), "no = ?", array($no1));
            $objQuery->update("dtb_csv", array("col" => "substring(message from 1 for 15) as D" . $no2), "no = ?", array($no2));
            $objQuery->update("dtb_csv", array("col" => "message as yur_article"), "no = ?", array($no3));
            $objQuery->update("dtb_csv", array("col" => $depovalue1 . " as depo_article1"), "no = ?", array($depono1));
            $objQuery->update("dtb_csv", array("col" => $depovalue2 . " as depo_article2"), "no = ?", array($depono2));
            $objQuery->update("dtb_csv", array("col" => $depovalue3 . " as depo_article3"), "no = ?", array($depono3));
            $objQuery->update("dtb_csv", array("col" => $depovalue4 . " as depo_article4"), "no = ?", array($depono4));
            $objQuery->update("dtb_csv", array("col" => $depovalue5 . " as depo_article5"), "no = ?", array($depono5));
            $objQuery->update("dtb_csv", array("col" => $depovalue6 . " as depo_article6"), "no = ?", array($depono6));
            $objQuery->update("dtb_csv", array("col" => $km2value1 . " as km2_article1"), "no = ?", array($km2no1));
            $objQuery->update("dtb_csv", array("col" => $km2value2 . " as km2_article2"), "no = ?", array($km2no2));
            $objQuery->update("dtb_csv", array("col" => $km2value3 . " as km2_article3"), "no = ?", array($km2no3));
            $objQuery->update("dtb_csv", array("col" => $km2value4 . " as km2_article4"), "no = ?", array($km2no4));
            $objQuery->update("dtb_csv", array("col" => $km2value5 . " as km2_article5"), "no = ?", array($km2no5));
        } else {
            $objQuery->update("dtb_csv", array("col" => "NULL as D" . $no1), "no = ?", array($no1));
            $objQuery->update("dtb_csv", array("col" => "NULL as D" . $no2), "no = ?", array($no2));
            $objQuery->update("dtb_csv", array("col" => "NULL as D" . $no3), "no = ?", array($no3));
            $objQuery->update("dtb_csv", array("col" => "NULL as D" . $depono1), "no = ?", array($depono1));
            $objQuery->update("dtb_csv", array("col" => "NULL as D" . $depono2), "no = ?", array($depono2));
            $objQuery->update("dtb_csv", array("col" => "NULL as D" . $depono3), "no = ?", array($depono3));
            $objQuery->update("dtb_csv", array("col" => "NULL as D" . $depono4), "no = ?", array($depono4));
            $objQuery->update("dtb_csv", array("col" => "NULL as D" . $depono5), "no = ?", array($depono5));
            $objQuery->update("dtb_csv", array("col" => "NULL as D" . $depono6), "no = ?", array($depono6));
            $objQuery->update("dtb_csv", array("col" => "NULL as D" . $km2no1), "no = ?", array($km2no1));
            $objQuery->update("dtb_csv", array("col" => "NULL as D" . $km2no2), "no = ?", array($km2no2));
            $objQuery->update("dtb_csv", array("col" => "NULL as D" . $km2no3), "no = ?", array($km2no3));
            $objQuery->update("dtb_csv", array("col" => "NULL as D" . $km2no4), "no = ?", array($km2no4));
            $objQuery->update("dtb_csv", array("col" => "NULL as D" . $km2no5), "no = ?", array($km2no5));
        }

        //配達時間帯設定（佐川）
        $no = $objQuery->get("sagawa_shipping_time_no", "plg_expresslink_config_no", "id=1");
        $no2 = $objQuery->get("sagawa_seal1_no", "plg_expresslink_config_no", "id=1");
        $no3 = $objQuery->get("sagawa_shipping_time_pro_no", "plg_expresslink_config_no", "id=1");
        $no4 = $objQuery->get("sagawa_seal1_pro_no", "plg_expresslink_config_no", "id=1");
        $no5 = $objQuery->get("sagawa_shipping_time_bizlogi_no", "plg_expresslink_config_no", "id=1");

        if ($arrData["sagawa_shipping_time"] == 1) {
            $value = "(case when time_id = 1 then '01' when time_id = 2 then '12' when time_id = 3 then '14' when time_id = 4 then '16' when time_id = 5 then '18' when time_id = 6 then '19' else '' end)";
            $value2 = "(CASE WHEN time_id > 0 AND time_id < 7 THEN '019' WHEN shipping_date IS NOT NULL THEN '005' ELSE NULL END)";
            $value3 = "(case when time_id = 1 then '01' when time_id = 2 then '12' when time_id = 3 then '14' when time_id = 4 then '16' when time_id = 5 then '18' when time_id = 6 then '19' else '00' end)";
        } else {
            $value = "(case when time_id = 1 then '01' when time_id = 2 then '12' when time_id = 3 then '14' when time_id = 4 then '16' when time_id = 5 then '04' else '' end)";
            $value2 = "(CASE WHEN time_id > 0 AND time_id < 6 THEN '007' WHEN shipping_date IS NOT NULL THEN '005' ELSE NULL END)";
            $value3 = "(case when time_id = 1 then '01' when time_id = 2 then '12' when time_id = 3 then '14' when time_id = 4 then '16' when time_id = 5 then '04' else '00' end)";
        }
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no), "no = ?", array($no));
        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no2), "no = ?", array($no2));
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no3), "no = ?", array($no3));
        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no4), "no = ?", array($no4));
        $objQuery->update("dtb_csv", array("col" => $value3 . " as D" . $no5), "no = ?", array($no5));

        //配達時間帯設定（ゆうパックプリントv4）
        $no = $objQuery->get("yu_shipping_time_no", "plg_expresslink_config_no", "id=1");
        if ($arrData["yu_shipping_time"] == 1) {
            $value = "(case when time_id = 1 then '60' when time_id = 2 then '62' when time_id = 3 then '63' when time_id = 4 then '64' when time_id = 5 then '65' when time_id = 6 then '66' else '99' end)";
        } else {
            $value = "(case when time_id = 1 then '0' when time_id = 2 then '1' when time_id = 3 then '2' when time_id = 4 then '3' when time_id = 5 then '4' else '8' end)";
        }
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no), "no = ?", array($no));

        //配達時間帯設定（ゆうパックプリントR）
        $no = $objQuery->get("yur_shipping_time_no", "plg_expresslink_config_no", "id=1");
        if ($arrData["yur_shipping_time"] == 1) {
            $value = "(case when time_id = 1 then '51' when time_id = 2 then '52' when time_id = 3 then '53' when time_id = 4 then '54' when time_id = 5 then '55' when time_id = 6 then '56' else '00' end)";
        } else {
            $value = "(case when time_id = 1 then '61' when time_id = 2 then '62' when time_id = 3 then '63' else '00' end)";
        }
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no), "no = ?", array($no));

        //配達日時設定（カンガルー・マジック2）
        $no = $objQuery->get("km2_shipping_datetime_no", "plg_expresslink_config_no", "id=1");
        $value = "(case when shipping_date IS NULL AND time_id IS NULL then '' else ";
        if (DB_TYPE == "mysql") {
            $value .= "(case when shipping_date IS NOT NULL then date_format(shipping_date,'%m%d') else '0000' end)";
        } else {
            $value .= "(case when shipping_date IS NOT NULL then to_char(shipping_date,'MMDD') else '0000' end)";
        }
        if ($arrData["km2_send_type"] == 8) {
            $value .= " || (case when time_id = 1 then '5' when time_id = 2 then '6' when time_id = 3 then '7' else '0' end)";
        } else {
            $value .= " || (case when time_id = 1 then '1' when time_id = 2 then '2' else '0' end)";
        }
        $value .= " end)";
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no), "no = ?", array($no));

        //代引き設定
        $no2 = $objQuery->get("yamato_cod_payment_no", "plg_expresslink_config_no", "id=1");
        $no3 = $objQuery->get("yamato_cod_tax_no", "plg_expresslink_config_no", "id=1");
        $no4 = $objQuery->get("sagawa_payment_method_no", "plg_expresslink_config_no", "id=1");
        $no5 = $objQuery->get("sagawa_cod_payment_no", "plg_expresslink_config_no", "id=1");
        $no6 = $objQuery->get("sagawa_cod_tax_no", "plg_expresslink_config_no", "id=1");
        $no7 = $objQuery->get("yu_payment_method_no", "plg_expresslink_config_no", "id=1");
        $no8 = $objQuery->get("yu_cod_payment_no", "plg_expresslink_config_no", "id=1");
        $no9 = $objQuery->get("yu_cod_tax_no", "plg_expresslink_config_no", "id=1");
        $no10 = $objQuery->get("sagawa_payment_method_pro_no", "plg_expresslink_config_no", "id=1");
        $no11 = $objQuery->get("sagawa_cod_payment_pro_no", "plg_expresslink_config_no", "id=1");
        $no12 = $objQuery->get("sagawa_cod_tax_pro_no", "plg_expresslink_config_no", "id=1");
        $no13 = $objQuery->get("sagawa_seal2_no", "plg_expresslink_config_no", "id=1");
        $no14 = $objQuery->get("sagawa_seal2_pro_no", "plg_expresslink_config_no", "id=1");
        $no15 = $objQuery->get("ebusiness_cod_payment_no", "plg_expresslink_config_no", "id=1");
        $no16 = $objQuery->get("ebusiness_cod_tax_no", "plg_expresslink_config_no", "id=1");
        $no17 = $objQuery->get("yur_payment_method_no", "plg_expresslink_config_no", "id=1");

        $no19 = $objQuery->get("yur_cod_payment_no", "plg_expresslink_config_no", "id=1");
        $no20 = $objQuery->get("yur_cod_tax_no", "plg_expresslink_config_no", "id=1");
        $no21 = $objQuery->get("sagawa_cod_payment_bizlogi_no", "plg_expresslink_config_no", "id=1");
        $no22 = $objQuery->get("sagawa_cod_tax_bizlogi_no", "plg_expresslink_config_no", "id=1");
        $no23 = $objQuery->get("km2_cod_payment_no", "plg_expresslink_config_no", "id=1");
        $no24 = $objQuery->get("km2_cod_tax_no", "plg_expresslink_config_no", "id=1");

        if ($arrData['cod_id'] != "" && !is_null($arrData['cod_id'])) {
            $value2 = $value3 = $value4 = $value5 = $value6 = $value7 = $value8 = $value9 = $value10 = $value11 = $value12 = $value18 = "(case";
            foreach ($arrData['cod_id'] as $id) {
                $value2 .= " when payment_id = " . $id . " AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) then payment_total";
                $value3 .= " when payment_id = " . $id . " AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) then tax";
                $value4 .= " when payment_id = " . $id . " AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) then '2'";
                $value5 .= " when payment_id = " . $id . " AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) then payment_total";
                $value6 .= " when payment_id = " . $id . " AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) then tax";
                $value7 .= " when payment_id = " . $id . " AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) then '1'";
                $value8 .= " when payment_id = " . $id . " AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) then payment_total";
                $value9 .= " when payment_id = " . $id . " AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) then tax";
                $value10 .= " when payment_id = " . $id . " AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) then (payment_total - tax)";


                if ($arrData['sagawa_ecorect'] == 1) {
                    $value11 .= " when payment_id = " . $id . " AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) then '008'";
                    $value12 .= " when payment_id = " . $id . " AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) then '1'";
                } elseif ($arrData['sagawa_ecorect'] == 2) {
                    $value11 .= " when payment_id = " . $id . " AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) then '009'";
                    $value12 .= " when payment_id = " . $id . " AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) then '2'";
                } elseif ($arrData['sagawa_ecorect'] == 3) {
                    $value11 .= " when payment_id = " . $id . " AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) then '010'";
                    $value12 .= " when payment_id = " . $id . " AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) then '0'";
                } else {
                    $value11 .= " when payment_id = " . $id . " then NULL";
                    $value12 .= " when payment_id = " . $id . " then NULL";
                }
            }
            $value2 .= " else NULL end)";
            $value3 .= " else NULL end)";
            $value4 .= " else '0' end)";
            $value5 .= " else NULL end)";
            $value6 .= " else NULL end)";
            $value7 .= " else '0' end)";
            $value8 .= " else NULL end)";
            $value9 .= " else NULL end)";
            $value10 .= " else NULL end)";
            $value11 .= " else NULL end)";
            $value12 .= " else NULL end)";
        } else {
            $value2 = "NULL";
            $value3 = "NULL";
            $value4 = "('0')";
            $value5 = "NULL";
            $value6 = "NULL";
            $value7 = "('0')";
            $value8 = "NULL";
            $value9 = "NULL";
            $value10 = "NULL";
            $value11 = "NULL";
            $value12 = "NULL";
        }
        if (plg_ExpressLink_Utils::getConfig("km2_cod_output") == 1) {
            $value19 = $value2;
            $value20 = $value3;
        } else {
            $value19 = "('')";
            $value20 = "('')";
        }

        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no2), "no = ?", array($no2));
        $objQuery->update("dtb_csv", array("col" => $value3 . " as D" . $no3), "no = ?", array($no3));
        $objQuery->update("dtb_csv", array("col" => $value4 . " as D" . $no4), "no = ?", array($no4));
        $objQuery->update("dtb_csv", array("col" => $value5 . " as D" . $no5), "no = ?", array($no5));
        $objQuery->update("dtb_csv", array("col" => $value6 . " as D" . $no6), "no = ?", array($no6));
        $objQuery->update("dtb_csv", array("col" => $value7 . " as D" . $no7), "no = ?", array($no7));
        $objQuery->update("dtb_csv", array("col" => $value8 . " as D" . $no8), "no = ?", array($no8));
        $objQuery->update("dtb_csv", array("col" => $value9 . " as D" . $no9), "no = ?", array($no9));
        $objQuery->update("dtb_csv", array("col" => $value12 . " as D" . $no10), "no = ?", array($no10));
        $objQuery->update("dtb_csv", array("col" => $value10 . " as D" . $no11), "no = ?", array($no11));
        $objQuery->update("dtb_csv", array("col" => $value5 . " as D" . $no12), "no = ?", array($no12));
        $objQuery->update("dtb_csv", array("col" => $value11 . " as D" . $no13), "no = ?", array($no13));
        $objQuery->update("dtb_csv", array("col" => $value11 . " as D" . $no14), "no = ?", array($no14));
        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no15), "no = ?", array($no15));
        $objQuery->update("dtb_csv", array("col" => $value3 . " as D" . $no16), "no = ?", array($no16));
        $objQuery->update("dtb_csv", array("col" => $value4 . " as D" . $no17), "no = ?", array($no17));

        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no19), "no = ?", array($no19));
        $objQuery->update("dtb_csv", array("col" => $value3 . " as D" . $no20), "no = ?", array($no20));
        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no21), "no = ?", array($no21));
        $objQuery->update("dtb_csv", array("col" => $value3 . " as D" . $no22), "no = ?", array($no22));
        $objQuery->update("dtb_csv", array("col" => $value19 . " as D" . $no23), "no = ?", array($no23));
        $objQuery->update("dtb_csv", array("col" => $value20 . " as D" . $no24), "no = ?", array($no24));

        //依頼主情報（メールアドレス）
        $no1 = $objQuery->get("sagawa_order_email_bizlogi_no", "plg_expresslink_config_no", "id=1");
        if ($arrData["order_type"] == 0) {
            $value = "order_email";
        } elseif ($arrData["order_type"] == 1) {
            $value = "(SELECT email03 FROM dtb_baseinfo)";
        } else {
            $value = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (SELECT email03 FROM dtb_baseinfo) else order_email end)";
        }
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no1), "no = ?", array($no1));

        //依頼主情報（電話番号）
        $no = $objQuery->get("yamato_order_tel_no", "plg_expresslink_config_no", "id=1");
        $no2 = $objQuery->get("sagawa_order_tel_no", "plg_expresslink_config_no", "id=1");
        $no3 = $objQuery->get("yu_order_tel_no", "plg_expresslink_config_no", "id=1");
        $no4 = $objQuery->get("sagawa_order_tel_pro_no", "plg_expresslink_config_no", "id=1");
        $no5 = $objQuery->get("ebusiness_order_tel_no", "plg_expresslink_config_no", "id=1");
        $no6 = $objQuery->get("yur_order_tel_no", "plg_expresslink_config_no", "id=1");
        $no7 = $objQuery->get("sagawa_order_tel_bizlogi_no", "plg_expresslink_config_no", "id=1");
        $no8 = $objQuery->get("km2_order_tel_no", "plg_expresslink_config_no", "id=1");

        if ($arrData["order_type"] == 0) {
            $value = "order_tel01 || order_tel02 || order_tel03";
            $value2 = "order_tel01 || '-' || order_tel02 || '-' || order_tel03";
        } elseif ($arrData["order_type"] == 1) {
            $value = "(SELECT tel01 || tel02 || tel03 FROM dtb_baseinfo)";
            $value2 = "(SELECT tel01 || '-' || tel02 || '-' || tel03 FROM dtb_baseinfo)";
        } else {
            $value = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (SELECT tel01 || tel02 || tel03 FROM dtb_baseinfo) else (order_tel01 || order_tel02 || order_tel03) end)";
            $value2 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (SELECT tel01 || '-' || tel02 || '-' || tel03 FROM dtb_baseinfo) else (order_tel01 || '-' || order_tel02 || '-' || order_tel03) end)";
        }
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no), "no = ?", array($no));
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no2), "no = ?", array($no2));
        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no3), "no = ?", array($no3));
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no4), "no = ?", array($no4));
        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no5), "no = ?", array($no5));
        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no6), "no = ?", array($no6));
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no7), "no = ?", array($no7));
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no8), "no = ?", array($no8));

        //依頼主情報（郵便番号）
        $no = $objQuery->get("yamato_order_zip_no", "plg_expresslink_config_no", "id=1");
        $no2 = $objQuery->get("sagawa_order_zip_no", "plg_expresslink_config_no", "id=1");
        $no3 = $objQuery->get("yu_order_zip_no", "plg_expresslink_config_no", "id=1");
        $no4 = $objQuery->get("sagawa_order_zip_pro_no", "plg_expresslink_config_no", "id=1");
        $no5 = $objQuery->get("ebusiness_order_zip_no", "plg_expresslink_config_no", "id=1");
        $no6 = $objQuery->get("yur_order_zip_no", "plg_expresslink_config_no", "id=1");
        $no7 = $objQuery->get("sagawa_order_zip_bizlogi_no", "plg_expresslink_config_no", "id=1");

        if ($arrData["order_type"] == 0) {
            $value = "order_zip01 || order_zip02";
            $value2 = "order_zip01 || '-' || order_zip02";
        } elseif ($arrData["order_type"] == 1) {
            $value = "(SELECT zip01 || zip02 FROM dtb_baseinfo)";
            $value2 = "(SELECT zip01 || '-' || zip02 FROM dtb_baseinfo)";
        } else {
            $value = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (SELECT zip01 || zip02 FROM dtb_baseinfo) else (order_zip01 || order_zip02) end)";
            $value2 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (SELECT zip01 || '-' || zip02 FROM dtb_baseinfo) else (order_zip01 || '-' || order_zip02) end)";
        }
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no), "no = ?", array($no));
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no2), "no = ?", array($no2));
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no3), "no = ?", array($no3));
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no4), "no = ?", array($no4));
        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no5), "no = ?", array($no5));
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no6), "no = ?", array($no6));
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no7), "no = ?", array($no7));

        //依頼主情報（名前）
        $no = $objQuery->get("yamato_order_name_no", "plg_expresslink_config_no", "id=1");
        $no2 = $objQuery->get("sagawa_order_name01_no", "plg_expresslink_config_no", "id=1");
        $no3 = $objQuery->get("sagawa_order_name02_no", "plg_expresslink_config_no", "id=1");
        $no4 = $objQuery->get("yu_order_name_no", "plg_expresslink_config_no", "id=1");
        $no5 = $objQuery->get("sagawa_order_name01_pro_no", "plg_expresslink_config_no", "id=1");
        $no6 = $objQuery->get("sagawa_order_name02_pro_no", "plg_expresslink_config_no", "id=1");
        $no7 = $objQuery->get("ebusiness_order_name01_no", "plg_expresslink_config_no", "id=1");
        $no8 = $objQuery->get("ebusiness_order_name02_no", "plg_expresslink_config_no", "id=1");
        $no9 = $objQuery->get("yur_order_name1_no", "plg_expresslink_config_no", "id=1");
        $no10 = $objQuery->get("yur_order_name2_no", "plg_expresslink_config_no", "id=1");
        $no11 = $objQuery->get("sagawa_order_name01_bizlogi_no", "plg_expresslink_config_no", "id=1");
        $no12 = $objQuery->get("sagawa_order_name02_bizlogi_no", "plg_expresslink_config_no", "id=1");
        $no13 = $objQuery->get("km2_order_name_no", "plg_expresslink_config_no", "id=1");
        if ($arrData["order_type"] == 0) {
            $value = "order_name01 || order_name02";
            $value2 = "order_name01";
            $value3 = "order_name02";
            $value8 = "substring(order_name01 || order_name02 from 1 for 20)";
            if (plg_ExpressLink_Utils::getECCUBEVer() >= 2130) {
                $value4 = "(case when CHARACTER_LENGTH(order_company_name) > 0 then substring(order_company_name from 1 for 16) else (order_name01 || order_name02) end)";
                $value5 = "(case when CHARACTER_LENGTH(order_company_name) > 0 then substring((order_name01 || order_name02) from 1 for 16) else NULL end)";
                $value6 = "(case when CHARACTER_LENGTH(order_company_name) > 0 then order_company_name else (order_name01 || order_name02) end)";
                $value7 = "(case when CHARACTER_LENGTH(order_company_name) > 0 then (order_name01 || order_name02) else NULL end)";
            } else {
                $value4 = "substring(order_name01 || order_name02 from 1 for 16)";
                $value5 = $value7 = "NULL";
                $value6 = "order_name01 || order_name02";
            }
        } elseif ($arrData["order_type"] == 1) {
            $value = $value2 = $value6 = "(SELECT shop_name FROM dtb_baseinfo)";
            $value4 = "substring((SELECT shop_name FROM dtb_baseinfo) from 1 for 16)";
            $value5 = "substring((SELECT shop_name FROM dtb_baseinfo) from 17 for 16)";
            $value3 = $value7 = "NULL";
            $value8 = "substring((SELECT shop_name FROM dtb_baseinfo) from 1 for 20)";
        } else {
            $value = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (SELECT shop_name FROM dtb_baseinfo) else (order_name01 || order_name02) end)";
            $value2 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (SELECT shop_name FROM dtb_baseinfo) else (order_name01) end)";
            $value3 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then NULL else (order_name02) end)";
            $value8 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (SELECT shop_name FROM dtb_baseinfo) else substring((order_name01 || order_name02) from 1 for 20) end)";
            if (plg_ExpressLink_Utils::getECCUBEVer() >= 2130) {
                $value4 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then substring((SELECT shop_name FROM dtb_baseinfo) from 1 for 16) else (case when CHARACTER_LENGTH(order_company_name) > 0 then substring(order_company_name from 1 for 16) else  substring((order_name01 || order_name02) from 1 for 16) end) end)";
                $value5 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then NULL else (case when CHARACTER_LENGTH(order_company_name) > 0 then substring((order_name01 || order_name02) from 1 for 16) else NULL end) end)";
                $value6 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (SELECT shop_name FROM dtb_baseinfo) else (case when CHARACTER_LENGTH(order_company_name) > 0 then order_company_name else (order_name01 || order_name02) end) end)";
                $value7 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then NULL else (case when CHARACTER_LENGTH(order_company_name) > 0 then (order_name01 || order_name02) else NULL end) end)";
            } else {
                $value4 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then substring((SELECT shop_name FROM dtb_baseinfo) from 1 for 16) else substring((order_name01 || order_name02) from 1 for 16) end)";
                $value5 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then NULL else NULL end)";
                $value6 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (SELECT shop_name FROM dtb_baseinfo) else (order_name01 || order_name02) end)";
                $value7 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then NULL else NULL end)";
            }
        }
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no), "no = ?", array($no));
        $objQuery->update("dtb_csv", array("col" => $value4 . " as D" . $no2), "no = ?", array($no2));
        $objQuery->update("dtb_csv", array("col" => $value5 . " as D" . $no3), "no = ?", array($no3));
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no4), "no = ?", array($no4));
        $objQuery->update("dtb_csv", array("col" => $value4 . " as D" . $no5), "no = ?", array($no5));
        $objQuery->update("dtb_csv", array("col" => $value5 . " as D" . $no6), "no = ?", array($no6));
        $objQuery->update("dtb_csv", array("col" => $value6 . " as D" . $no7), "no = ?", array($no7));
        $objQuery->update("dtb_csv", array("col" => $value7 . " as D" . $no8), "no = ?", array($no8));
        $objQuery->update("dtb_csv", array("col" => $value6 . " as D" . $no9), "no = ?", array($no9));
        $objQuery->update("dtb_csv", array("col" => $value7 . " as D" . $no10), "no = ?", array($no10));
        $objQuery->update("dtb_csv", array("col" => $value4 . " as D" . $no11), "no = ?", array($no11));
        $objQuery->update("dtb_csv", array("col" => $value5 . " as D" . $no12), "no = ?", array($no12));
        $objQuery->update("dtb_csv", array("col" => $value8 . " as D" . $no13), "no = ?", array($no13));

        //依頼主情報（カナ）
        $no = $objQuery->get("yamato_order_kana_no", "plg_expresslink_config_no", "id=1");
        $no2 = $objQuery->get("yu_order_kana_no", "plg_expresslink_config_no", "id=1");
        if ($arrData["order_type"] == 0) {
            $value = "order_kana01 || order_kana02";
        } elseif ($arrData["order_type"] == 1) {
            $value = "(SELECT shop_kana FROM dtb_baseinfo)";
        } else {
            $value = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (SELECT shop_kana FROM dtb_baseinfo) else (order_kana01 || order_kana02) end)";
        }
        $objQuery->update("dtb_csv", array("col" => $value . " as yamato_order_kana"), "no = ?", array($no));
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no2), "no = ?", array($no2));

        //依頼主情報（住所）
        $no = $objQuery->get("yamato_order_addr01_no", "plg_expresslink_config_no", "id=1");
        $no2 = $objQuery->get("yamato_order_addr02_no", "plg_expresslink_config_no", "id=1");
        $no3 = $objQuery->get("sagawa_order_addr01_no", "plg_expresslink_config_no", "id=1");
        $no4 = $objQuery->get("sagawa_order_addr02_no", "plg_expresslink_config_no", "id=1");
        $no5 = $objQuery->get("yu_order_addr_no", "plg_expresslink_config_no", "id=1");
        $no6 = $objQuery->get("sagawa_order_addr01_pro_no", "plg_expresslink_config_no", "id=1");
        $no7 = $objQuery->get("sagawa_order_addr02_pro_no", "plg_expresslink_config_no", "id=1");
        $no8 = $objQuery->get("sagawa_order_addr03_pro_no", "plg_expresslink_config_no", "id=1");
        $no9 = $objQuery->get("ebusiness_order_addr01_no", "plg_expresslink_config_no", "id=1");
        $no10 = $objQuery->get("ebusiness_order_addr02_no", "plg_expresslink_config_no", "id=1");
        $no11 = $objQuery->get("yur_order_addr1_no", "plg_expresslink_config_no", "id=1");
        $no12 = $objQuery->get("yur_order_addr2_no", "plg_expresslink_config_no", "id=1");
        $no13 = $objQuery->get("yur_order_addr3_no", "plg_expresslink_config_no", "id=1");
        $no14 = $objQuery->get("sagawa_order_addr01_bizlogi_no", "plg_expresslink_config_no", "id=1");
        $no15 = $objQuery->get("sagawa_order_addr02_bizlogi_no", "plg_expresslink_config_no", "id=1");
        $no16 = $objQuery->get("km2_order_addr01_no", "plg_expresslink_config_no", "id=1");
        $no17 = $objQuery->get("km2_order_addr02_no", "plg_expresslink_config_no", "id=1");
        if ($arrData["order_type"] == 0) {
            $value = "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 1 for 56)";
            $value2 = "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 1 for 16)";
            $value3 = "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 17 for 16)";
            $value4 = "((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01)";
            $value5 = "order_addr02";
            $value6 = "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 33 for 16)";
            $value7 = "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 from 1 for 50)";
            $value8 = "substring(order_addr02 from 1 for 50)";
            $value9 = "substring(order_addr02 from 51 for 50)";
            $value10 = "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 1 for 20)";
            $value11 = "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 21 for 20)";
        } elseif ($arrData["order_type"] == 1) {
            $value = "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 || addr02 FROM dtb_baseinfo) from 1 for 56)";
            $value2 = "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 || addr02 FROM dtb_baseinfo) from 1 for 16)";
            $value3 = "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 || addr02 FROM dtb_baseinfo) from 17 for 16)";
            $value4 = "(SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 FROM dtb_baseinfo)";
            $value5 = "(SELECT addr02 FROM dtb_baseinfo)";
            $value6 = "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 || addr02 FROM dtb_baseinfo) from 33 for 16)";
            $value7 = "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 FROM dtb_baseinfo) from 1 for 50)";
            $value8 = "substring((SELECT addr02 FROM dtb_baseinfo) from 1 for 50)";
            $value9 = "substring((SELECT addr02 FROM dtb_baseinfo) from 51 for 50)";
            $value10 = "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 || addr02 FROM dtb_baseinfo) from 1 for 20)";
            $value11 = "substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 || addr02 FROM dtb_baseinfo) from 21 for 20)";
        } else {
            $value = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 || addr02 FROM dtb_baseinfo) from 1 for 56)) else (substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 1 for 56)) end)";
            $value2 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 || addr02 FROM dtb_baseinfo) from 1 for 16)) else (substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 1 for 16)) end)";
            $value3 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 || addr02 FROM dtb_baseinfo) from 17 for 16)) else (substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 17 for 16)) end)";
            $value4 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 FROM dtb_baseinfo) else ((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01) end)";
            $value5 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (SELECT addr02 FROM dtb_baseinfo) else order_addr02 end)";
            $value6 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 || addr02 FROM dtb_baseinfo) from 33 for 16)) else (substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 33 for 16)) end)";
            $value7 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 FROM dtb_baseinfo) from 1 for 50)) else (substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 from 1 for 50)) end)";
            $value8 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (substring((SELECT addr02 FROM dtb_baseinfo) from 1 for 50)) else (substring(order_addr02 from 1 for 50)) end)";
            $value9 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (substring((SELECT addr02 FROM dtb_baseinfo) from 51 for 50)) else (substring(order_addr02 from 51 for 50)) end)";
            $value10 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 || addr02 FROM dtb_baseinfo) from 1 for 20)) else (substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 1 for 20)) end)";
            $value11 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then (substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_baseinfo ON mtb_pref.id = dtb_baseinfo.pref) || (SELECT addr01 || addr02 FROM dtb_baseinfo) from 21 for 20)) else (substring((SELECT mtb_pref.name FROM mtb_pref INNER JOIN dtb_order ON mtb_pref.id = dtb_order.order_pref WHERE dtb_shipping.order_id = dtb_order.order_id) || order_addr01 || order_addr02 from 21 for 20)) end)";
        }
        $objQuery->update("dtb_csv", array("col" => $value4 . " as D" . $no), "no = ?", array($no));
        $objQuery->update("dtb_csv", array("col" => $value5 . " as D" . $no2), "no = ?", array($no2));
        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no3), "no = ?", array($no3));
        $objQuery->update("dtb_csv", array("col" => $value3 . " as D" . $no4), "no = ?", array($no4));
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no5), "no = ?", array($no5));
        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no6), "no = ?", array($no6));
        $objQuery->update("dtb_csv", array("col" => $value3 . " as D" . $no7), "no = ?", array($no7));
        $objQuery->update("dtb_csv", array("col" => $value6 . " as D" . $no8), "no = ?", array($no8));
        $objQuery->update("dtb_csv", array("col" => $value4 . " as D" . $no9), "no = ?", array($no9));
        $objQuery->update("dtb_csv", array("col" => $value5 . " as D" . $no10), "no = ?", array($no10));
        $objQuery->update("dtb_csv", array("col" => $value7 . " as D" . $no11), "no = ?", array($no11));
        $objQuery->update("dtb_csv", array("col" => $value8 . " as D" . $no12), "no = ?", array($no12));
        $objQuery->update("dtb_csv", array("col" => $value9 . " as D" . $no13), "no = ?", array($no13));
        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no14), "no = ?", array($no14));
        $objQuery->update("dtb_csv", array("col" => $value3 . " as D" . $no15), "no = ?", array($no15));
        $objQuery->update("dtb_csv", array("col" => $value10 . " as D" . $no16), "no = ?", array($no16));
        $objQuery->update("dtb_csv", array("col" => $value11 . " as D" . $no17), "no = ?", array($no17));

        //依頼主情報（敬称）
        $no = $objQuery->get("yu_compellation2_no", "plg_expresslink_config_no", "id=1");
        $no2 = $objQuery->get("yur_compellation2_no", "plg_expresslink_config_no", "id=1");
        if ($arrData["order_type"] == 0) {
            $value = "('" . $arrData['yu_compellation2'] . "')";
            $value2 = "('" . $arrData['yur_compellation2'] . "')";
        } elseif ($arrData["order_type"] == 1) {
            $value = "NULL";
            $value2 = "NULL";
        } else {
            $value = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then NULL else ('" . $arrData['yu_compellation2'] . "') end)";
            $value2 = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then NULL else ('" . $arrData['yur_compellation2'] . "') end)";
        }
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no), "no = ?", array($no));
        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no2), "no = ?", array($no2));

        //依頼主情報（ゆうパック同一フラグ）
        $no = $objQuery->get("yu_order_duplicate_flg_no", "plg_expresslink_config_no", "id=1");
        if ($arrData["order_type"] == 0) {
            $value = "(case when (order_addr01 || order_addr02 ) = (shipping_addr01 || shipping_addr02) then '1' else '0' end)";
        } elseif ($arrData["order_type"] == 1) {
            $value = "('0')";
        } else {
            $value = "('0')";
        }
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no), "no = ?", array($no));


        if (!SC_Utils_Ex::isBlank($arrData['cod_id'])) {
            $payment_where = " payment_id IN (" . implode(',', $arrData['cod_id']) . ") AND (shipping_id = '0' OR (SELECT COUNT(shipping_id) FROM dtb_shipping WHERE order_id = dtb_order.order_id) = 1) ";
        } else {
            $payment_where = "";
        }

        //送り状種類設定（B2）
        $no = $objQuery->get("yamato_send_type_no", "plg_expresslink_config_no", "id=1");
        $value = "(case";
        if (strlen($payment_where) > 0) {
            $value .= " when" . $payment_where . " then '2'";
        }
        if (!SC_Utils_Ex::isBlank($arrData['yamato_mail'])) {
            $value .= " when deliv_id IN (" . implode(',', $arrData['yamato_mail']) . ") then '3'";
        }
        if (!SC_Utils_Ex::isBlank($arrData['yamato_timeservice'])) {
            $value .= " when deliv_id IN (" . implode(',', $arrData['yamato_timeservice']) . ") then '4'";
        }
        if (!SC_Utils_Ex::isBlank($arrData['yamato_express_mail'])) {
            $value .= " when deliv_id IN (" . implode(',', $arrData['yamato_express_mail']) . ") then '6'";
        }
        if (!SC_Utils_Ex::isBlank($arrData['yamato_necopos'])) {
            $value .= " when deliv_id IN (" . implode(',', $arrData['yamato_necopos']) . ") then '7'";
        }
        if (!SC_Utils_Ex::isBlank($arrData['yamato_compact'])) {
            $value .= " when deliv_id IN (" . implode(',', $arrData['yamato_compact']) . ") then '8'";
        }
        if (strlen($value) > 5) {
            $value .= " else '0' end)";
        } else {
            $value = "('0')";
        }
        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no), "no = ?", array($no));

        //便種設定（佐川急便系）
        $no1 = $objQuery->get("sagawa_speed_type_no", "plg_expresslink_config_no", "id=1");
        $no2 = $objQuery->get("sagawa_speed_type_pro_no", "plg_expresslink_config_no", "id=1");
        $no3 = $objQuery->get("sagawa_send_type_bizlogi_no", "plg_expresslink_config_no", "id=1");
        $value1 = $value2 = $depo_send_type = "(case";
        if (!SC_Utils_Ex::isBlank($arrData['sagawa_super'])) {
            $value1 .= " when deliv_id IN (" . implode(',', $arrData['sagawa_super']) . ") then '001'";
            $value2 .= " when deliv_id IN (" . implode(',', $arrData['sagawa_super']) . ") then '004'";
            $depo_send_type .= " when deliv_id IN (" . implode(',', $arrData['sagawa_super']) . ") then '001'";
        }
        if (!SC_Utils_Ex::isBlank($arrData['sagawa_express'])) {
            $value1 .= " when deliv_id IN (" . implode(',', $arrData['sagawa_express']) . ") then '002'";
            $value2 .= " when deliv_id IN (" . implode(',', $arrData['sagawa_express']) . ") then '005'";
            $depo_send_type .= " when deliv_id IN (" . implode(',', $arrData['sagawa_express']) . ") then '002'";
        }
        if (!SC_Utils_Ex::isBlank($arrData['sagawa_air'])) {
            $value1 .= " when deliv_id IN (" . implode(',', $arrData['sagawa_air']) . ") then '003'";
            $value2 .= " when deliv_id IN (" . implode(',', $arrData['sagawa_air']) . ") then '002'";
            $depo_send_type .= " when deliv_id IN (" . implode(',', $arrData['sagawa_air']) . ") then '030'";
        }
        if (!SC_Utils_Ex::isBlank($arrData['sagawa_justtime'])) {
            $value1 .= " when deliv_id IN (" . implode(',', $arrData['sagawa_justtime']) . ") then '005'";
            $value2 .= " when deliv_id IN (" . implode(',', $arrData['sagawa_justtime']) . ") then '003'";
        }
        if (strlen($value1) > 5) {
            $value1 .= " else '000' end)";
            $value2 .= " else '001' end)";
            $depo_send_type .= " else '000' end)";
        } else {
            $value1 = "('000')";
            $value2 = "('001')";
            $depo_send_type = "000";
        }


        $objQuery->update("dtb_csv", array("col" => $value1 . " as D" . $no1), "no = ?", array($no1));
        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no2), "no = ?", array($no2));
        $objQuery->update("dtb_csv", array("col" => $depo_send_type . " as D" . $no3), "no = ?", array($no3));

        //配達時間帯指定郵便種別設定（ゆうプリR）
//		$no = $objQuery->get("yur_time_type_no","plg_expresslink_config_no","id=1");
//		$value = "(case when time_id IS NOT NULL then '1' else '0' end)";
//		$objQuery->update("dtb_csv",array("col" => $value." as D".$no),"no = ?",array($no));
        //郵便種別・送り状種別設定（ゆうプリR）
        $no = $objQuery->get("yur_deliv_type_no", "plg_expresslink_config_no", "id=1");
        $no2 = $objQuery->get("yur_send_type_no", "plg_expresslink_config_no", "id=1");

        $value = $value2 = "(case";
        if (!SC_Utils_Ex::isBlank($arrData['yur_pack'])) {
            $deliv_where = " deliv_id IN (" . implode(',', $arrData['yur_pack']) . ")";
            $value .= " when " . $deliv_where . " then '0'";

            if (strlen($payment_where) > 0) {
                if ($arrData['yur_send_type2'] == '') {
                    $value2 .= " when" . $deliv_where . " AND " . $payment_where . " then NULL";
                } else {
                    $value2 .= " when" . $deliv_where . " AND " . $payment_where . " then '" . $arrData['yur_send_type2'] . "'";
                }
            }
            if ($arrData['yur_send_type1'] == '') {
                $value2 .= " when " . $deliv_where . " then NULL";
            } else {
                $value2 .= " when " . $deliv_where . " then '" . $arrData['yur_send_type1'] . "'";
            }
        }
        if (!SC_Utils_Ex::isBlank($arrData['yur_mail'])) {
            $deliv_where = " deliv_id IN (" . implode(',', $arrData['yur_mail']) . ")";
            $value .= " when " . $deliv_where . " then '1'";

            if (strlen($payment_where) > 0) {
                if ($arrData['yur_mail_send_type2'] == '') {
                    $value2 .= " when" . $deliv_where . " AND " . $payment_where . " then NULL";
                } else {
                    $value2 .= " when" . $deliv_where . " AND " . $payment_where . " then '" . $arrData['yur_mail_send_type2'] . "'";
                }
            }
            if ($arrData['yur_mail_send_type1'] == '') {
                $value2 .= " when " . $deliv_where . " then NULL";
            } else {
                $value2 .= " when " . $deliv_where . " then '" . $arrData['yur_mail_send_type1'] . "'";
            }
        }
        if (!SC_Utils_Ex::isBlank($arrData['yur_definite'])) {
            $deliv_where = " deliv_id IN (" . implode(',', $arrData['yur_definite']) . ")";
            $value .= " when " . $deliv_where . " AND time_id IS NOT NULL then '7' when " . $deliv_where . " then '2'";

            if (strlen($payment_where) > 0) {
                if ($arrData['yur_definite_send_type2'] == '') {
                    $value2 .= " when" . $deliv_where . " AND " . $payment_where . " AND time_id IS NOT NULL then NULL when" . $deliv_where . " AND " . $payment_where . "then NULL";
                } else {
                    $value2 .= " when" . $deliv_where . " AND " . $payment_where . " AND time_id IS NOT NULL then '" . $arrData['yur_time_definite_send_type2'] . "' when" . $deliv_where . " AND " . $payment_where . "then '" . $arrData['yur_definite_send_type2'] . "'";
                }
            }
            if ($arrData['yur_definite_send_type1'] == '') {
                $value2 .= " when " . $deliv_where . " AND time_id IS NOT NULL then NULL when " . $deliv_where . " then NULL";
            } else {
                $value2 .= " when " . $deliv_where . " AND time_id IS NOT NULL then '" . $arrData['yur_time_definite_send_type1'] . "' when " . $deliv_where . " then '" . $arrData['yur_definite_send_type1'] . "'";
            }
        }
        if (!SC_Utils_Ex::isBlank($arrData['yur_nodefinite'])) {
            $deliv_where = " deliv_id IN (" . implode(',', $arrData['yur_nodefinite']) . ")";
            $value .= " when " . $deliv_where . " AND time_id IS NOT NULL then '8' when " . $deliv_where . " then '3'";

            if (strlen($payment_where) > 0) {
                if ($arrData['yur_nodefinite_send_type2'] == '') {
                    $value2 .= " when" . $deliv_where . " AND " . $payment_where . " AND time_id IS NOT NULL then NULL when" . $deliv_where . " AND " . $payment_where . "then NULL";
                } else {
                    $value2 .= " when" . $deliv_where . " AND " . $payment_where . " AND time_id IS NOT NULL then '" . $arrData['yur_time_nodefinite_send_type2'] . "' when" . $deliv_where . " AND " . $payment_where . "then '" . $arrData['yur_nodefinite_send_type2'] . "'";
                }
            }
            if ($arrData['yur_nodefinite_send_type1'] == '') {
                $value2 .= " when " . $deliv_where . " AND time_id IS NOT NULL then NULL when " . $deliv_where . " then NULL";
            } else {
                $value2 .= " when " . $deliv_where . " AND time_id IS NOT NULL then '" . $arrData['yur_time_nodefinite_send_type1'] . "' when " . $deliv_where . " then '" . $arrData['yur_nodefinite_send_type1'] . "'";
            }
        }
        if (!SC_Utils_Ex::isBlank($arrData['yur_packet'])) {

            $deliv_where = " deliv_id IN (" . implode(',', $arrData['yur_packet']) . ")";
            $value .= " when " . $deliv_where . " then '5'";
            if ($arrData['yur_packet_send_type1'] == '') {
                $value2 .= " when " . $deliv_where . " then NULL";
            } else {
                $value2 .= " when " . $deliv_where . " then '" . $arrData['yur_packet_send_type1'] . "'";
            }
        }
        if (!SC_Utils_Ex::isBlank($arrData['yur_label'])) {
            $deliv_where = " deliv_id IN (" . implode(',', $arrData['yur_label']) . ")";
            $value .= " when " . $deliv_where . " then '6'";

            if (strlen($payment_where) > 0) {
                if ($arrData['yur_label_send_type2'] == '') {
                    $value2 .= " when" . $deliv_where . " AND " . $payment_where . " then NULL";
                } else {
                    $value2 .= " when" . $deliv_where . " AND " . $payment_where . " then '" . $arrData['yur_label_send_type2'] . "'";
                }
            }
            if ($arrData['yur_label_send_type1'] == '') {
                $value2 .= " when " . $deliv_where . " then NULL";
            } else {
                $value2 .= " when " . $deliv_where . " then '" . $arrData['yur_label_send_type1'] . "'";
            }
        }
        if (!SC_Utils_Ex::isBlank($arrData['yur_yupacket'])) {
            $deliv_where = " deliv_id IN (" . implode(',', $arrData['yur_yupacket']) . ")";
            $value .= " when " . $deliv_where . " then '9'";
            if ($arrData['yur_yupacket_send_type1'] == '') {
                $value2 .= " when " . $deliv_where . " then NULL";
            } else {
                $value2 .= " when " . $deliv_where . " then '" . $arrData['yur_yupacket_send_type1'] . "'";
            }
        }
        if (strlen($value) > 5) {
            $value .= " else '0' end)";
        } else {
            $value = "('0')";
        }
        if (strlen($payment_where) > 0) {
            if ($arrData['yur_send_type2'] == '') {
                $value2 .= " when" . $payment_where . " then NULL";
            } else {
                $value2 .= " when" . $payment_where . " then '" . $arrData['yur_send_type2'] . "'";
            }
        }
        if ($arrData['yur_send_type1'] != '') {
            if (strlen($value2) > 6) {
                $value2 .= " else '" . $arrData['yur_send_type1'] . "' end)";
            } else {
                $value2 = "'" . $arrData['yur_send_type1'] . "'";
            }
        } else {
            if (strlen($value2) > 6) {
                $value2 .= " else NULL end)";
            } else {
                $value2 = "NULL";
            }
        }


        $objQuery->update("dtb_csv", array("col" => $value . " as D" . $no), "no = ?", array($no));
        $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no2), "no = ?", array($no2));

        //クール便・冷凍便設定
        $no1 = $objQuery->get("yamato_cool_type_no", "plg_expresslink_config_no", "id=1");
        $no2 = $objQuery->get("sagawa_product_type_no", "plg_expresslink_config_no", "id=1");
        $no3 = $objQuery->get("sagawa_product_type_pro_no", "plg_expresslink_config_no", "id=1");
        $no4 = $objQuery->get("yu_cool_type_no", "plg_expresslink_config_no", "id=1");
        $no5 = $objQuery->get("yur_cool_type_no", "plg_expresslink_config_no", "id=1");
        $no6 = $objQuery->get("ebusiness_cool_type_no", "plg_expresslink_config_no", "id=1");
        $no7 = $objQuery->get("sagawa_send_type_bizlogi_no", "plg_expresslink_config_no", "id=1");

        $sealno3 = $objQuery->get("sagawa_seal3_no", "plg_expresslink_config_no", "id=1");
        $sealprono4 = $objQuery->get("sagawa_seal4_pro_no", "plg_expresslink_config_no", "id=1");

        if (!isset($depo_send_type))
            $depo_send_type = '';
        $value1 = "plg_delivcool_type";
        $value2 = "(case when dtb_shipping.plg_delivcool_type = '1' then '2' when dtb_shipping.plg_delivcool_type = '2' then '1' else '' end)";
        $value3 = "(case when dtb_shipping.plg_delivcool_type = '1' then '002' when dtb_shipping.plg_delivcool_type = '2' then '003' else '001' end)";
        $value4 = "(case when dtb_shipping.plg_delivcool_type = '1' then '140' when dtb_shipping.plg_delivcool_type = '2' then '150' else '" . $depo_send_type . "' end)";
        $sealvalue = "(case when dtb_shipping.plg_delivcool_type = '1' then '001' when dtb_shipping.plg_delivcool_type = '2' then '002' else '' end)";

        if ($arrData['delivcool_comb'] == 1) {
            $objQuery->update("dtb_csv", array("col" => $value2 . " as D" . $no1), "no = ?", array($no1));
            $objQuery->update("dtb_csv", array("col" => $value3 . " as D" . $no2), "no = ?", array($no2));
            $objQuery->update("dtb_csv", array("col" => $value1 . " as D" . $no3), "no = ?", array($no3));
            $objQuery->update("dtb_csv", array("col" => $value1 . " as D" . $no4), "no = ?", array($no4));
            $objQuery->update("dtb_csv", array("col" => $value1 . " as D" . $no5), "no = ?", array($no5));
            $objQuery->update("dtb_csv", array("col" => $value1 . " as D" . $no6), "no = ?", array($no6));
            $objQuery->update("dtb_csv", array("col" => $value4 . " as D" . $no7), "no = ?", array($no7));
            $objQuery->update("dtb_csv", array("col" => $sealvalue . " as D" . $sealno3), "no = ?", array($sealno3));
            $objQuery->update("dtb_csv", array("col" => $sealvalue . " as D" . $sealprono4), "no = ?", array($sealprono4));
        } else {
            $objQuery->update("dtb_csv", array("col" => "NULL as yu_cool_type"), "no = ?", array($no4));
            $objQuery->update("dtb_csv", array("col" => "NULL as yur_cool_type"), "no = ?", array($no5));
            $objQuery->update("dtb_csv", array("col" => "NULL as ebusiness_cool_type"), "no = ?", array($no6));
            $objQuery->update("dtb_csv", array("col" => "(CASE WHEN plg_expresslink_center_stop = 1 THEN '004' ELSE NULL END)"), "no = ?", array($sealno3));
            $objQuery->update("dtb_csv", array("col" => "NULL as sagawa_seal4_pro"), "no = ?", array($sealprono4));
        }
    }

}

?>
