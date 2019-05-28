$(document).ready(function () {


  // validation for registration

     $('#createproduct').validate({ // initialize the plugin
    rules: {

        product_name: {
            required: true,
            pattern:"[a-zA-Z]+",
            minlength: 3,
            maxlength: 55
            
        },
        category_id: {
            required: true,

        },

        product_colour: {
            required: true,
            pattern:"[a-zA-Z]+",
            minlength: 3,
            maxlength: 20
            
        },
        size: {
            required: true,
            pattern:"[0-9]+",
            minlength: 1,
            maxlength: 2,
           
        },
        description: {
            required: true,
            minlength: 10,
            maxlength: 255
            
        },
        product_image: {
            required: true
        },
        price: {
            required: true,
            pattern:"[0-9]+",
            minlength: 1,
            maxlength: 3
        }

        }

     });

   // validation for create category

     $('#createcategory').validate({ // initialize the plugin
    rules: {

        name: {
            required: true,
            pattern:"[a-zA-Z]+",
            minlength: 3,
            maxlength: 10            
        },
        description: {
             required: true,
            pattern:"[a-zA-Z]+",
            minlength: 5,
            maxlength: 255
           
        },


        }
       
     });

     

});



