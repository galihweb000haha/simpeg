(function ($) {
	$.extend($.ui, { DateTimepicker: {} });


	$.datepickers._base_updateDatepickers = $.datepickers._updateDatepickers;
	$.datepickers._updateDatepickers = function (inst) {
		$.datepickers._base_updateDatepickers(inst);

		var val = inst.input.val();

		if (inst.input.hasClass("datetimepickers") == false) return;

		var bottomLayer = $(".ui-datepicker").append("<div class='.datetimepickers' />");
		bottomLayer.append(html1);
		bottomLayer.append("Jam ");
		bottomLayer.append(html2);
		bottomLayer.append("Menit");

		$.datetimepicker.setTime(val, inst.input);
	};


	function DateTimePickers(options) {

		this.defaultDateTimePicker =
			{
				showTimePicker: false,
				time_format: 'hh:mm:ss'
			};

		hourHTML = $("<select class='dateimepicker-hour' onchange='$.datetimepickers.isDirty = true;'></select>");
		minutsHTML = $("<select class='dateimepicker-minuts' onchange='$.datetimepickers.isDirty = true;'></select>");
		secondHTML = $("<select class='dateimepicker-second' onchange='$.datetimepickers.isDirty = true;'></select>");

		for (i = 1; i <= 24; i++) html1 = hourHTML.append("<option>" + i + "</option");
		for (i = 10; i < 60; i = i + 5) html2 = minutsHTML.append("<option>" + i + "</option");
	}

	$.fn.extend({
		datetimepicker: function (options) {
			$.datetimepicker._attach(this, options);
		}
	});

	DateTimePickers.prototype = {
		_initTimePicker: function () {
		},

		isDirty: false,

		innerOption: function ($this) {

			return {
				changeMonth: true,
				changeYear: true,
				autoSize: false,
				onSelect: function (a, b) {
					var hour = $('.ui-datepicker .dateimepicker-hour').val();
					var minuts = $('.ui-datepicker .dateimepicker-minuts').val();

					var time = hour + ":" + minuts;
					$this.val($this.val() + " " + time);
                                        
					$.datetimepickers.setTime($this.val(), $this);
                                        
					$.datetimepickers.reset();
				},
				onClose: function (a, b) {
					if ($.datetimepicker.isDirty) {
						$this.val($.datepicker._formatDate(b));

						var hour = $('.ui-datepicker .dateimepicker-hour').val();
						var minuts = $('.ui-datepicker .dateimepicker-minuts').val();

						var time = hour + ":" + minuts;
						$this.val($this.val() + " " + time);

					}
				}
			};
		},

		_attach: function ($this, options) {
			$this.datepicker($.fn.extend(this.innerOption($this), options))
				.addClass("datetimepickers");

			this.setTime($this.val(), $this);

		},

		reset: function () {
			this.isDirty = false;
		},

		setTime: function (format, $this) {
			var arrStr = format.split(' ');

			var hour = 12;
			var minuts = 0;

			if (arrStr.length > 1) {
				var strTime = arrStr[1];
				var arr = strTime.split(':');
				if (arr.length > 0) {
					hour = arr[0];
					if (arr.length > 1) minuts = arr[1];
				}
			}

			$('.ui-datepicker .dateimepicker-hour').val(hour);
			$('.ui-datepicker .dateimepicker-minuts').val(minuts);
		}
	};
        
	$.datetimepickers = new DateTimePickers();
	$.datetimepickers._initTimePicker();

} (jQuery));