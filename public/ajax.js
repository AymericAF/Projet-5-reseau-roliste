class Address{
    constructor(){
        this.city = $('#city').val();
        // this.street = $('#registration_street').val();
        this.lat = $('#registration_gpsLat').val();
        this.long = $('#registration_gpsLong').val();
        this.postalCode = $('#registration_postalCode').val();
    }
}

var newAddress = new Address();

if(newAddress.lat === ""){
    console.log("Nous n'avons pas de latitude");
} else{
    console.log("La latitude est de "+ newAddress.lat);
}




$("#city").keyup(function(){
        $("#citySelection").empty();
        newAddress.city = $("#city").val();
        $.ajax({
            url: "https://api-adresse.data.gouv.fr/search/?q="+ newAddress.city +"&type=municipality&limit=10",
    
            success: function(data) {
                for(i=0; i<data.features.length; i++){
                    $('#citySelection').append('<option value='+ data.features[i].properties.city +'>'+data.features[i].properties.postcode.substr(0,2)+'</option>');
                }   
                console.log(newAddress.city);
            },
        });
    });

$("#city").change(function(){
    $.ajax({
        url: "https://api-adresse.data.gouv.fr/search/?q="+ newAddress.city +"&type=municipality&limit=1",

        success: function(data) {
            newAddress.postalCode = $('#registration_postalCode').val(data.features[0].properties.postcode);
            newAddress.long = $('#registration_gpsLat').val(data.features[0].geometry.coordinates[0]);
            newAddress.lat = $('#registration_gpsLat').val(data.features[0].geometry.coordinates[1]);
            console.log(data.features[0].geometry.coordinates);
        },
    });
})

// $("#city").keyup(function(){
//     $("#citySelection").empty();
//     var cityInput = $("#city").val();
    
//     $.ajax({
//         url: "https://api-adresse.data.gouv.fr/search/?q="+ cityInput +"&type=municipality&limit=10",

//         success: function(data) {
//             for(i=0; i<data.features.length; i++){
//                 $('#citySelection').append('<option value='+ data.features[i].properties.city+'>'+data.features[i].properties.postcode.substr(0,2)+'</option>');
//             }   
//         },
//     });
// });

// $("#city").change(function(){
//     var cityInput = $("#city").val();
//     console.log(cityInput);
//     $.ajax({
//         url: "https://api-adresse.data.gouv.fr/search/?q="+ cityInput +"&type=municipality&limit=1",

//         success: function(data) {
//             $('#registration_postalCode').val(data.features[0].properties.postcode);
//             console.log(data.features[0].geometry.coordinates);

//         },
//     });
// })

// $("#registration_postalCode").change(function(){
//     $("#city").val('');
//     var cityPostalCode = $("#registration_postalCode").val();
    
//     $.ajax({
//         url: "https://api-adresse.data.gouv.fr/search/?q="+ cityPostalCode +"&type=municipality&limit=1",

//         success: function(data) {
//             $('#city').val(data.features[0].properties.city);
//             console.log(data.features[0].geometry.coordinates);  
//         }
//     });
// });

// $("#registration_street").change(function(){
//     // $("#city").val('');
//     var street = $("#registration_street").val();
    
//     $.ajax({
//         url: "https://api-adresse.data.gouv.fr/search/?q="+ street +"&type=street&limit=1",

//         success: function(data) {
//             $('#registration_street').val(data.features[0].properties.name);
//             console.log(data.features[0].geometry.coordinates);  
//         }
//     });
// });

// $("#registration_street").keyup(function(){
//     // $("#registration_street").empty();
//     var street = $("#registration_street").val();
    
//     $.ajax({
//         url: "https://api-adresse.data.gouv.fr/search/?q="+ street +"&type=street&limit=10",

//         success: function(data) {
//             for(i=0; i<data.features.length; i++){
//                 $('#streetSelection').append('<option value='+ data.features[i].properties.label+'>'+data.features[i].properties.stre+'</option>');
//             }   
//         },
//     });
// });

$("#search").keyup(function(){
    // $("#citySelection").empty();
    var cityInput = $("#search").val();
    
    $.ajax({
        url: "https://api-adresse.data.gouv.fr/search/?q="+ cityInput +"&type=municipality&limit=10",

        success: function(data) {
            for(i=0; i<data.features.length; i++){
                $('#citySelection').append('<option value='+ data.features[i].properties.city+'>'+data.features[i].properties.postcode.substr(0,2)+'</option>');
            }   
        },
    });
});
