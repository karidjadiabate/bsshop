$.ajax({
    type: "GET",
    url: "http://localhost/bsshop/ajax/categories.php",
    data: "data",
    // dataType: "dataType",
    success: function (data) {
        console.log(data);
        $("#categories_product").append(data)
    }
});