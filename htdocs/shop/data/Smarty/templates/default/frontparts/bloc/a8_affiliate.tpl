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