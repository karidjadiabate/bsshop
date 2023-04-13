<?php 
?>
  <script type="text/javascript">
        function refresh() {
            var t = 1000; // rafraîchissement en millisecondes
            setTimeout('showDate()', t)
        }

        function showDate() {
            var date = new Date()
            var h = date.getHours();
            var m = date.getMinutes();
            var s = date.getSeconds();
            if (h < 10) {
                h = '0' + h;
            }
            if (m < 10) {
                m = '0' + m;
            }
            if (s < 10) {
                s = '0' + s;
            }
            var time = h + ':' + m + ':' + s
            //On crée une date
            let date1 = new Date();

            let dateLocale = date1.toLocaleString('fr-FR', {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric',
               
            });
           
            document.getElementById('horloge').innerHTML = dateLocale + " " + time;
            refresh();
        }
    </script>
    </head>


<body onload=showDate();>
   
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>

    <header class="header axil-header header-style-2">

        <div class="" style="background-color:#ff4e50" >
            <div class="container position-relative ">
                <div class="campaign-content">

                    <p>
                        <marquee>
                           
                            <span class="float-left" style="color:white;font-weight:bolder;">Telephone: <a href="tel:+2250787856389">(+225) 0787856389 </a></span>&nbsp;&nbsp;&nbsp;
                            <span class="float-left" style="color:white;font-weight:bolder;">Email: <a href="mailto:">karidjadiabate0304@gmail.com</a></span>&nbsp;&nbsp;&nbsp;
                            <span class="float-left" style="color:white;font-weight:bolder;">Whatsapp: <a href="https://wa.me/message/3OV4QRDQ7W47K1" target='_blank'>(+225) 0787856389</a></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <span id='horloge' class="float-end" style="color:white;font-weight:bolder;"></span>
                        </marquee>
                    </p>

                </div>

            </div>
        </div>
       
        </div>