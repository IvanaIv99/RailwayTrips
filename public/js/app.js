$(document).ready(function (){
    $('.select2').select2();

    searchTrips();
});

function searchTrips(){

    $("#searchTrips").submit(function(event){
        event.preventDefault();

        var data = {};
        var formValues= $(this).serializeArray().map(function(x){
            data[x.name] = x.value;
        });


       if(formValidate(data)){

           $.ajax({
               type:"get",
               url:$("#searchTrips").attr('action'),
               data:data,
               dataType: 'json',
               success:function(response){
                   if(response['success'] === true){
                       $('.table-responsive').show();
                       $(".empty-table-msg").html("");
                       printTrips(response);

                   }else{
                       $('.table-responsive').hide();
                       $(".empty-table-msg").html(response.data);
                   }

               }
           });

       }


    });

}

// Form validation
function formValidate(form_value){

    var errors = [];

    checkValue(form_value['train_from'],form_value['train_to'],"Train from and train to cant be the same",errors);
    checkValue(form_value['train_from'],"0","Please choose train from",errors);
    checkValue(form_value['train_to'],"0","Please choose train to",errors);
    checkValue(form_value['departure'],"","Please choose departure date",errors);

    if((!checkValue(form_value['departure'],"","Please choose departure date",errors))){

        // Checks if date is in the fast
         const pastDate = (date) => {
             const today = new Date();
             today.setHours(0, 0, 0, 0);
             return date < today;
         }

         if(pastDate(new Date(form_value['departure']))) {
             errors.push(form_value['departure']);
             $(".invalid-err").html("Selected date is in the past");
         }

    }


    if(errors.length > 0){
        return false;
    }else{
        $(".invalid-err").html("");
        return true;
    }

}

// Fields validation
function checkValue(field,value,message,errors){
    if(field === value){
        errors.push(field);
        $(".invalid-err").html(message);
        return true;
    }
    return false;
}

function isPastDate(date) {
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    return date < today;
}

//Prints ajax response
function printTrips(response){

     let date_of_journey = response['data']['date_of_journey']

     var trHTML = '';
     var trHTMLstoppages = '';


     $.each(response['data']['response'], function (i, item) {

         i++;
         trHTML += `<tr data-bs-toggle="collapse" data-bs-target="#r${item.route.trip_id}"> ` +
             '<th scope="row">' + i + '</th>' +
             '<td>' + item.route.start_city_station.name + '</td>' +
             '<td>' + item.route.end_city_station.name + '</td>' +
             '<td>' + dateFormat(date_of_journey) + ' | ' + timeFormat(item.route.arrival) + '</td>' +
             '<td>' + dateFormat(date_of_journey) + ' | ' + timeFormat(item.route.departure) + '</td>' +
             '<td>' + item.route.time + '</td>' +
             '<td>' + item.route.distance + '</td>' +
             '<td>' + item.trip.carrier.name + ' <i class="fa fa-train"></i></td>' +
             '<td>' + '<button class="btn btn-details btn-default btn-xs"> Details <i class="fa fa-arrow-right"> </button>' + '</td>' +
             `</tr> <tr class="collapse accordion-collapse" id="r${item.route.trip_id}" data-bs-parent=".table">` +
             '<td colspan="8"> ' +
             '<table class="table table-striped table-primary"> ' +
                 '<thead>' +
                 '<tr class="info">' +
                     '<th>Route</th>' +
                     '<th>Arrival</th>' +
                     '<th>Departure</th>' +
                 '</tr>' +
                 '</thead>' +
                 `<tbody id="stoppages_tbody">
                    ${ stoppages_print(item.trip.routes) }
                 </tbody>` +
             '</table>' +
             ' </td>' +
             ' </tr>';


     });

     $('#records_table').html(trHTML);

}

//Changing date format
function dateFormat(date_string){
    var options = { month: 'short', day: 'numeric' };
    var date  = new Date(date_string);
    return date.toLocaleDateString("en-US", options);
}

//Changing time format
function timeFormat(time_string){
    return time_string.substring(0, 5) + "h";
}

//Printing details table
function stoppages_print(routes){

    trHTMLstoppages = '';

    $.each(routes, function (i, item){

        let crossover  = item.stoppage.crossover === 1 ? "Yes" : "No" ;
        trHTMLstoppages +=
            '<tr data-toggle="collapse"  class="accordion-toggle" >' +
            '<td>' + item.stoppage.start_city_station.name + ' - ' + item.stoppage.end_city_station.name + '</td>' +
            '<td>' + timeFormat(item.stoppage.arrival) + '</td>' +
            '<td>' + timeFormat(item.stoppage.departure) + '</td>' +
            '</tr>';
    });

   return trHTMLstoppages;
}
