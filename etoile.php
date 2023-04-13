<?php
?>
 <script>
            $("#notes").val(0);
            $("#plus").click(function(e) {
                etoile = $("#etoiles").val();
                $("#notes").val(etoile);

                if (etoile == 1) {
                    if ($("#1").hasClass("fal fa-star")) {
                        $("#1").removeClass("fal fa-star");
                        $("#1").addClass("fas fa-star");
                    }
                }
                if (etoile == 2) {
                    if ($("#2").hasClass("fal fa-star")) {
                        $("#2").removeClass("fal fa-star");
                        $("#2").addClass("fas fa-star");
                    }
                }
                if (etoile == 3) {
                    if ($("#3").hasClass("fal fa-star")) {
                        $("#3").removeClass("fal fa-star");
                        $("#3").addClass("fas fa-star");
                    }
                }
                if (etoile == 4) {
                    if ($("#4").hasClass("fal fa-star")) {
                        $("#4").removeClass("fal fa-star");
                        $("#4").addClass("fas fa-star");
                    }
                }
                if (etoile == 5) {
                    $("#plus").hide();
                    if ($("#5").hasClass("fal fa-star")) {
                        $("#5").removeClass("fal fa-star");
                        $("#5").addClass("fas fa-star");
                    }
                }
            });
            $("#moins").click(function(e) {
                etoile = $("#etoiles").val();
                $("#notes").val(etoile);
                $("#plus").show();
                if (etoile == 0) {
                    if ($("#1").hasClass("fas fa-star")) {
                        $("#1").removeClass("fas fa-star");
                        $("#1").addClass("fal fa-star");
                    }
                }
                if (etoile == 1) {
                    if ($("#2").hasClass("fas fa-star")) {
                        $("#2").removeClass("fas fa-star");
                        $("#2").addClass("fal fa-star");
                    }
                }
                if (etoile == 2) {
                    if ($("#3").hasClass("fas fa-star")) {
                        $("#3").removeClass("fas fa-star");
                        $("#3").addClass("fal fa-star");
                    }
                }
                if (etoile == 3) {
                    if ($("#4").hasClass("fas fa-star")) {
                        $("#4").removeClass("fas fa-star");
                        $("#4").addClass("fal fa-star");
                    }
                }
                if (etoile == 4) {
                    if ($("#5").hasClass("fas fa-star")) {
                        $("#5").removeClass("fas fa-star");
                        $("#5").addClass("fal fa-star");
                    }
                }

            });
        </script>