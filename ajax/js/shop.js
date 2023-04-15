
var url = "http://localhost/bsshop/";

$("#whatsapp").focusout(function () {
    if ($(this).val().length != 17 && $(this).val().length != 15) {
        swal({
            title: "erreur!",
            text: "Format du numero Whatsapp incorrect ! (+225) XXXXXXXXXX ou (+225) XXXXXXXX",
            icon: "error",
            buttons: ["OK"],
            dangerMode: false,
        })
        $("#whatsapp").focus();
    }
});
$("#phone").focusout(function () {
    if ($(this).val().length != 17) {
        swal({
            title: "erreur!",
            text: "Format du numero incorrect ! (+225) XXXXXXXXXX",
            icon: "error",
            buttons: ["OK"],
            dangerMode: false,
        })
        $("#phone").focus();
    }
});

function DeleteCart() {
    swal({
        title: "Confirmation",
        text: "Etes-vous sûr de vider le panier  ?",
        icon: "warning",
        buttons: ["Non, annuler", "Oui, je confirme"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "GET",
                    url: url + "ajax/shop.php",
                    data: {
                        // "product_id": id,
                        "action": 'deleteAll'
                    },
                    // dataType: "JSON",
                    success: function (data) {
                        $("#cart-dropdown").html(data)
                        total = $("#countProducts").val();
                        $(".cart-count").text(total);
                        // swal({
                        //     title: "Validé!",
                        //     text: "Panier vidé avec succes!",
                        //     icon: "success",
                        //     confirmButtonText: "OK"
                        // });
                        window.location.href = url + '?msg=viderPanier';
                    }
                });
            } else {
                swal({
                    title: "Alerte !",
                    text: "Operation non confirmée!",
                    icon: "warning",
                    confirmButtonText: "OK"
                });
            }
        });

}
function annulerCommande() {
    swal({
        title: "Confirmation",
        text: "Etes-vous sûr d'annuler cette commande  ?",
        icon: "warning",
        buttons: ["Non, annuler", "Oui, je confirme"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "GET",
                    url: url + "ajax/shop.php",
                    data: {
                        // "product_id": id,
                        "action": 'deleteAll'
                    },
                    // dataType: "JSON",
                    success: function (data) {
                        $("#cart-dropdown").html(data)
                        total = $("#countProducts").val();
                        $(".cart-count").text(total);
                        // swal({
                        //     title: "Validé!",
                        //     text: "Panier vidé avec succes!",
                        //     icon: "success",
                        //     confirmButtonText: "OK"
                        // });
                        window.location.href = url + '?msg=vider';
                    }
                });
            } else {
                swal({
                    title: "Alerte !",
                    text: "Operation d'annulation non confirmée!",
                    icon: "warning",
                    confirmButtonText: "OK"
                });
            }
        });

}

function AddToCart(id) {

    $.ajax({
        type: "GET",
        url: url + "ajax/shop.php",
        data: {
            "product_id": id,
            "action": 'add',
        },
        // dataType: "JSON",
        success: function (data) {
            $("#cart-dropdown").html(data)
            total = $("#countProducts").val();
            $(".cart-count").text(total);
            
             toastr.success("Article ajouté au panier!","validé!!!");
        }
    });
};
function AddToCartDetail(id) {
    // alert('okokoko');
    var quantite = $("#quantite").val();
    $.ajax({
        type: "GET",
        url: url + "ajax/shop.php",
        data: {
            "product_id": id,
            "action": 'add',
            "quantite": quantite,
        },
        // dataType: "JSON",
        success: function (data) {
            $("#cart-dropdown").html(data)
            total = $("#countProducts").val();
            $(".cart-count").text(total);
            // swal({
            //     title: "Validé!",
            //     text: "Article ajouté au panier!",
            //     icon: "success",
            //     confirmButtonText: "OK"
            // });
            toastr.success("Article ajouté au panier!","validé!!!");
        }
    });
};
function AddToCartDetailCart(id) {
    // alert('okokoko');
    var quantite = 1;
    $.ajax({
        type: "GET",
        url: url + "ajax/shop.php",
        data: {
            "product_id": id,
            "action": 'add',
            "quantite": quantite,
        },
        // dataType: "JSON",
        success: function (data) {
            $("#cart-dropdown").html(data)
            total = $("#countProducts").val();
            $(".cart-count").text(total);
            // swal({
            //     title: "Validé!",
            //     text: "Article ajouté au panier!",
            //     icon: "success",
            //     confirmButtonText: "OK"
            // });
            window.location.href = url + 'cart.php?msg=ajout';
        }
    });
};
$.ajax({
    type: "GET",
    url: url + "ajax/shop.php",
    data: { "action": 'add' },
    // dataType: "JSON",
    success: function (data) {
        console.log(data);
        $("#cart-dropdown").html(data)
        total = $("#countProducts").val();
        $(".cart-count").text(total);

    }
});
function removeProduct(id) {
    // alert(id);
    $.ajax({
        type: "GET",
        url: url + "ajax/shop.php",
        data: {
            "product_id": id,
            "action": 'delete'
        },
        // dataType: "JSON",
        success: function (data) {
            console.log(data);
            $("#cart-dropdown").html(data)
            total = $("#countProducts").val();
            $(".cart-count").text(total);
            // swal({
            //     title: "Supprimé!",
            //     text: "Article supprimé du panier!",
            //     icon: "error",
            //     confirmButtonText: "OK"
            // });
            toastr.info("Article supprimé du panier!","validé!!!");
        }
    });
}
function removeProductCart(id) {
    // alert(id);
    $.ajax({
        type: "GET",
        url: url + "ajax/shop.php",
        data: {
            "product_id": id,
            "action": 'delete'
        },
        // dataType: "JSON",
        success: function (data) {
            console.log(data);
            $("#cart-dropdown").html(data)
            total = $("#countProducts").val();
            // $(".cart-count").text(total);
            // swal({
            //     title: "Supprimé!",
            //     text: "Article supprimé du panier!",
            //     icon: "error",
            //     confirmButtonText: "OK"
            // });
            window.location.href = url + 'cart.php?msg=vide';
        }
    });
}
function RemoveToCart(id) {
    // alert(id);
    $.ajax({
        type: "GET",
        url: url + "ajax/shop.php",
        data: {
            "product_id": id,
            "action": 'deleteOne'
        },
        // dataType: "JSON",
        success: function (data) {
            console.log(data);
            $("#cart-dropdown").html(data)
            total = $("#countProducts").val();
            // $(".cart-count").text(total);
            // swal({
            //     title: "Supprimé!",
            //     text: "Article supprimé du panier!",
            //     icon: "error",
            //     confirmButtonText: "OK"
            // });
            window.location.href = url + 'cart.php?msg=vide';
        }
    });
}


