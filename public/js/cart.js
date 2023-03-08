function getcart(){
    $.ajax({
        url: baseURL+'/cart',
        type: 'GET',
        success: function(data){
            $('#cartcontainer').html(data);
        }
    });
}

function addcart(id){
    $.ajax({
        url: baseURL+'/cart/create',
        type: 'GET',
        data: {
            id:id
        },
        success: function(data){
            $.notify({
                icon: 'fa fa-check',
                title: 'Success!',
                message: 'Item Successfully added to your cart'
            },{
                element: 'body',
                position: null,
                type: "success",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: true,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });
        }
    });
}

function updatecart(id,qty){
    $.ajax({
        url: baseURL+'/cart/updateqty',
        type: 'GET',
        data: {
            id:id,
            qty:qty
        },
        success: function(data){
        }
    });
}

function subscribe(mail){
    $.ajax({
        url: baseURL+'/subscribe',
        type: 'GET',
        dataType: 'json',
        data: {
            mail:mail
        },
        success: function(data){
            var modal = $("#afterSubscribe");
            console.log(data)
            console.log(data.message)

      			modal.modal("show");
            $(".subsMessage").html(data.message);
          }
    });
}

function addqty(productid,qty){
    $.ajax({
        url: baseURL+'/cart/addqty',
        type: 'GET',
        data: {
            productid:productid,
            qty:qty
        },
        success: function(data){
            $.notify({
                icon: 'fa fa-check',
                title: 'Success!',
                message: 'Item Successfully added to your cart'
            },{
                element: 'body',
                position: null,
                type: "success",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: true,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });
        }
    });
}

function deletecart(id){
    $.ajax({
        url: baseURL+'/cart/delete',
        type: 'GET',
        data: {
            id:id
        },
        success: function(data){
            $.notify({
                icon: 'fa fa-check',
                title: 'Success!',
                message: 'Item Successfully deleted from your cart'
            },{
                element: 'body',
                position: null,
                type: "success",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: true,
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });
        }
    });
}

function formatNumber(angka) {
	var number_string = angka.replace(/[^,\d]/g, "").toString(),
		split = number_string.split(","),
		sisa = split[0].length % 3,
		rupiah = split[0].substr(0, sisa),
		ribuan = split[0].substr(sisa).match(/\d{3}/gi);

	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if (ribuan) {
		separator = sisa ? "." : "";
		rupiah += separator + ribuan.join(".");
	}

	rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
	return rupiah;
}

$(window).on('load',function(){
    getcart();

    //add to cart
    $('.addtocart').on('click',function(){
      console.log(id);
        id = $(this).data('productid');
            addcart(id);
            getcart();
    })
})

$('.subsButton').on('click', function(){
    email = $('#mce-EMAIL').val();
    subscribe(email);
})

$(document).ready(function() {
    $('.input-number').on('click',function(){
        id = $(this).data('prodid');
        price = $(this).data('price');
        total = $('.input-number').val() * price;
        $('.total-price'+id).text(total);

    });
});

$(document).ajaxSuccess(function() {
    //deletecart
    $('.deletecart').on('click',function(){
        id = $(this).data('productid');
        if(sessionuser == 1){
            deletecart(id);
            getcart();
        }else{
            $('#alertcart').modal('show');
        }
    });
})
