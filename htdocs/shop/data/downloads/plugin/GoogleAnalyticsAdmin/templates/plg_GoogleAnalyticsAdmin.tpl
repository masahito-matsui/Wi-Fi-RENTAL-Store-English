<!--{*
 * やさしいGoogleAnalytics表示プラグイン
 * Copyright (C) 2014 株式会社アラタナ
 * info@aratana.jp
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*}-->
<!--{if $strGoogleAnalyticsError}-->
  <p>【GoogleAnalyticsプラグイン認証エラー】</p>
  <p><!--{$strGoogleAnalyticsError}--></p>
<!--{else}-->
  <!--{if $arrGoogleAnalyticsGraph}-->
  <script src="https://www.google.com/jsapi"></script>
  <script>
  google.load("visualization", "1", {packages:["corechart"]});
  google.setOnLoadCallback(drawChart);
  function drawChart()
  {
    var data = google.visualization.arrayToDataTable([
    ['日','ページビュー数（PV）','訪問数','ユニークユーザー数（UU）','受注金額'],
    <!--{foreach from=$arrGoogleAnalyticsGraph item=row name=data}-->
    [
      '<!--{$row->getDay()}-->日',
      <!--{$row->getPageviews()}-->,
      <!--{$row->getVisits()}-->,
      <!--{$row->getVisitors()}-->,
      <!--{$arrTotalMerge[$smarty.foreach.data.index].total}-->
    ],
    <!--{/foreach}-->
    ]);

    var options = {
      'fontName'  : 'メイリオ',
      'fontSize'  : 8,
      'height'    : 350,
      'chartArea' : {width: '90%', height: '80%'},
      'legend'    : {position: 'top', textStyle: {color: 'black', fontSize: 12}},
      'pointSize' : 7,
      'seriesType': "line",
      'series'    : {
                      0: {targetAxisIndex: 0, color: '#2689CC'},
                      1: {targetAxisIndex: 0, color: '#F9A819'},
                      2: {targetAxisIndex: 0, color: '#F94B19'},
                      3: {targetAxisIndex: 1, color: '#D8F380', type: 'bars'}
                    },
      'width'     : 1000
    };

    var chart = new google.visualization.ComboChart(document.getElementById('google-chart'));
    chart.draw(data, options);
  }
  $(function () {
    // Google Chart Area より上位に表示させる
    $('#navi li').css('z-index', 10);
  });
  </script>
  <h2>アクセス情報&nbsp;[&nbsp;表示期間：<!--{$strGoogleAnalyticsStartDate}-->&nbsp;～&nbsp;<!--{$strGoogleAnalyticsEndDate}-->&nbsp;]</h2>
  <div id="google-chart" style="width:100%;height:350px;margin: 0 0 10px 0;"></div>
  <!--{/if}-->
<!--{/if}-->