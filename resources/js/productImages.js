$(function(){

    if($("#drophere").length > 0 ) {
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let uniqueSecret = $('input[name="uniqueSecret"]').attr('value');
        let myDropzone = new Dropzone('#drophere',{
            url:'/product/images/upload',
            params:{
                _token: csrfToken,
                uniqueSecret: uniqueSecret,
            },

            addRemoveLinks: true,
            init: function(){
                $.ajax({
                    type: 'GET',
                    url: '/product/images',
                    data: {
                        uniqueSecret: uniqueSecret
                    },
                    dataType: 'json'
                }).done(function(data){
                    $.each(data, function(key, value){
                        let file = {
                            serverId: value.id
                        };
                        myDropzone.options.addedfile.call(myDropzone, file);
                        myDropzone.options.thumbnail.call(myDropzone, file, value.src);
                    });
                });
                
            }
        });

        myDropzone.on("success", function(file, response){
            file.serverId = response.id;
        });

        myDropzone.on("removedfile", function(file){
            $.ajax({
                type: 'DELETE',
                url: '/product/images/remove',
                data: {
                    _token: csrfToken,
                    id: file.serverId,
                    uniqueSecret: uniqueSecret
                },
                dataType: 'json'
            });
        });
    }


    if($("#edithere").length > 0 ) {
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let productId = $('input[name="productId"]').attr('value');
        let uniqueSecret2 = $('input[name="uniqueSecret2"]').attr('value');
        let myDropzone = new Dropzone('#edithere',{
            url:'/product/images/editupload',
            params:{
                _token: csrfToken,
                productId: productId,
                uniqueSecret2: uniqueSecret2
            },

            addRemoveLinks: true,
            init: function(){
                $.ajax({
                    type: 'GET',
                    url: '/product/edit/images',
                    data: {
                        productId: productId
                    },
                    dataType: 'json'
                }).done(function(data){
                    $.each(data, function(key, value){
                        let file = {
                            serverId: value.id
                        };
                        myDropzone.options.addedfile.call(myDropzone, file);
                        myDropzone.options.thumbnail.call(myDropzone, file, value.src);
                    });
                });
                $.ajax({
                    type: 'GET',
                    url: '/product/editget/images',
                    data: {
                        uniqueSecret2: uniqueSecret2
                    },
                    dataType: 'json'
                }).done(function(data){
                    $.each(data, function(key, value){
                        let file = {
                            serverId: value.id
                        };
                        myDropzone.options.addedfile.call(myDropzone, file);
                        myDropzone.options.thumbnail.call(myDropzone, file, value.src);
                    });
                });
                

                //se esistono i thumbnail sul server
                //cicla sui thumbnail
                //aggiungi ogni thumbnail a dropzone
            }
        });

        myDropzone.on("success", function(file, response){
            file.serverId = response.id;
        });

        // myDropzone.on("removedfile", function(file){
        //     $.ajax({
        //         type: 'DELETE',
        //         url: '/product/images/remove',
        //         data: {
        //             _token: csrfToken,
        //             id: file.serverId,
        //             uniqueSecret: uniqueSecret
        //         },
        //         dataType: 'json'
        //     });
        // });
    }





    

})