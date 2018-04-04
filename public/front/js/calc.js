$(document).ready(function(){
    $(".onlyDigitsSecond").keydown(function (e) {

        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190, 188]) !== -1 ||
                // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }


        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    $('.onlyDigitsSecond').keyup(function(){
        this.value = this.value.replace(/,/g, '.');
        if (this.value.match(/[^0-9.]/g)) {
            this.value = this.value.replace(/[^0-9.]/g, '');
        }

    });

    $('#square, #price, #nadbavka, #total, #rassrochka').keyup(function(){
        calculate();
    });
    $('#rassrochka').keyup(function(){
        calculate();
    });
 $('#rassrochka').change(function(){
        calculate();
    });
    $('#percent, #months, #rassrochka').change(function(){
        calculate();
    });
	
	$("#showcalc").click(function (e) {
		e.preventDefault();
		if($(this).data("on")==0){
			$(this).data("on",1);
		$("#calc_oncard").show();
		$("#img-first").hide();
		$(this).html(translate.palain);//в футере
		}else{
			$(this).data("on",0);
		$("#calc_oncard").hide();
		$("#img-first").show();
		$(this).html(translate.calculator);
		}
	});
	
});

function calculate(){
	var percent =parseFloat($('#percent option:selected').val());
	var months=parseInt($('#months').val());
	if (percent >= 0.3 && percent <= 0.49) {
		if (months <=6 ) {
			$("#nadbavka").val("15000");
		}
		if (months >=7 ) {
			$("#nadbavka").val("30000");
		}
		
	}
	if (percent >= 0.5 && percent <= 0.69) {
		if (months <=6 ) {
			$("#nadbavka").val("10000");
		}
		if (months >=7 ) {
			$("#nadbavka").val("20000");
		}
		
	}
	if (percent >= 0.7 && percent <= 1) {
		
		if (months <=6 ) {
			$("#nadbavka").val("5000");
		}
		if (months >=7 ) {
			$("#nadbavka").val("10000");
		}
		
		$("#nadbavka").val("0");
	}

    /* общая стоимость */
    var total = +$('#total').val() / +$('#square').val();
    $('#total').attr('data-info',$('#total').val());
    $('#price').val(getCurrencyNumber(total));

    /* в тенге */
    var vTenge = +$('#percent option:selected').val() * +$('#total').attr('data-info');
    $('#v-tenge').attr('data-info',vTenge);
    $('#v-tenge').html(razdel_number(getCurrencyNumber(vTenge)));

    /* остаток */
    var ostatok = ( (+$('#total').attr('data-info') - +$('#v-tenge').attr('data-info') ) / +$('#price').val() )*(+$('#price').val() + +$("#nadbavka").val());
    $('#ostatok').attr('data-info',ostatok);
	$('#ostatok').html(razdel_number(getCurrencyNumber(ostatok)));

	
	
    //var every = Math.round(+$('#ostatok').attr('data-info')/+$('#months option:selected').val());
	var every = Math.round(+$('#ostatok').attr('data-info')/+$('#months').val());
    $('#every').attr('data-info',every);
    $('#every').html(razdel_number(getCurrencyNumber(every)));

    var stoimost = +$('#ostatok').attr('data-info') + +$('#v-tenge').attr('data-info');
    $('#stoimost').attr('data-info',stoimost);
    $('#stoimost').html(razdel_number(getCurrencyNumber(stoimost)));

    var priceF1 = Math.round(+$('#stoimost').attr('data-info') / +$('#square').val());
    $('#price-f1').html(razdel_number(getCurrencyNumber(priceF1)));
}

function PMT(i, n, p) {
    return i * p * Math.pow((1 + i), n) / (1 - Math.pow((1 + i), n));
}

function getCurrencyNumber(number){
    number = parseFloat(number).toFixed(2);
    return number;
}

function razdel_number(number){
	var number = String(number);
    number = number.replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ');
    return number;
}
 var dateDiff = {
      /**
       * Разница между датами в месяцах
       * @param {Date} date1
       * @param {Date} date2
       * @returns {{months: number, daysCount: number}}
       */
      inMonths: function(date1, date2) {
         var begin = date1;
         var end = date2;
         // Сравниваем даты, расставим их так, чтобы начало было меньше либо равно концу
         if (date1.getTime() > date2.getTime()) {
            begin = date2;
            end = date1;
         }
         // Вычисляем суммарную разницу между датами по разницам в годах*12 и месяцах
         var months = (end.getFullYear() - begin.getFullYear()) * 12 + end.getMonth() - begin.getMonth();
         // Учитываем влияние разницы в днях на количество месяцев + остаток в днях в переменной daysCount
         var daysCount = 0;
         if (end.getDate() < begin.getDate()) {
            months -= 1;  // производим заем месяца из имеющихся
            // В зависимости от месяца в "меньшей" дате, вычисляем остаток в днях
            daysCount = dateDiff.daysInMonth(end.getFullYear(), begin.getMonth()) - begin.getDate() + end.getDate();
         }
         else {
            // при положительной или нулевой разнице дней
            daysCount = end.getDate() - begin.getDate();  // банальная разность
         }
         return {
            months: months,
            daysCount: daysCount
         };
      },
      /**
       * Количество дней в месяце указанного года
       * @param month - целевой месяц
       * @param year - целевой год
       * @returns {Number}
       */
      daysInMonth: function daysInMonth(month, year) {
         return new Date(year, month, 0).getDate();
      }
   };
   //console.log(dateDiff.inMonths(new Date(2015, 0, 1), new Date(2015, 0, 1)));