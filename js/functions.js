<script type="text/javascript">
    	var saleType = 2;
    	var prType = 2;

    	

    	$('.datepicker').datepicker({
			weekStart:1
		});

		var dragSlider = document.getElementById('drag');

		noUiSlider.create(dragSlider, {
			start: [ 1, 10000 ],
			behaviour: 'drag',
			connect: true,
			range: {
				'min':  1,
				'max':  10000
			}
		});

		dragSlider.noUiSlider.on('update', function() {
			var vals = dragSlider.noUiSlider.get();

			vals[0] = Math.floor(vals[0]) * 1000 ;
			vals[1] = Math.floor(vals[1]) * 1000 ;

			$("#slideStartVal").html("&#8377; " + vals[0]);
			$("#slideCloseVal").html("&#8377; " + vals[1]);
		});

		function fetchInfo() {
			var startPrice =  _("slideStartVal").innerHTML;
			var endPrice = _("slideCloseVal").innerHTML;

			startPrice = startPrice.substr(2,startPrice.length-2);
			endPrice = endPrice.substr(2,endPrice.length-2);

			xmldata = new XMLHttpRequest();
			var urltosend = "includes/fetcher.php?start=" + startPrice + "&end=" + endPrice+ "&prType=" + prType+ "&saleType=" + saleType;
			xmldata.open("GET", urltosend,false);
			xmldata.send(null);
			if(xmldata.responseText != ""){
				toPrint = xmldata.responseText;
			}

			document.getElementById('infosBox').innerHTML = toPrint;		
		}

		function updateInfo() {
			_("ErrorPanel").innerHTML = "";
			_("ErrorPanel").style.display = "";
			var address = _("address").value;
			var contact = _("contact").value;
			var oldPass = _("oldPass").value;
			var newPass = _("NewPass").value;

			updateXmldata = new XMLHttpRequest();
			var urltosend = "./update.php?" + "&address=" + address+"&save=" + 123+ "&oldPass=" + oldPass+ "&NewPass=" + newPass+"&contact=" + contact;
			updateXmldata.open("GET", urltosend,false);
			updateXmldata.send(null);
			if(updateXmldata.responseText != ""){
				toPrint = updateXmldata.responseText;
			}

			_("ErrorPanel").innerHTML = toPrint;	

			$("#ErrorPanel").fadeOut(6000);	
		}	

		function bringDown() {
			_("oldPass").value="";
			_("NewPass").value="";
		}

		function clickon(inp) {
			for(var i = 0; i < inp.length; i++)
				inp[i].click();
		}

		window.addEventListener("load",fetchInfo,false);
    
    </script>