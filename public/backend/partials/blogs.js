$(document).ready(function (){
    var table = $('#blogs').DataTable({
        processing : true,
        serverSide : true,
        responsive : true,
        autoWidth : true,
        autoLength : true,
        order : [0,'asc'],
        "ajax" : {
            "url" : baseUrl+"/gelAllBlogs",
            "type" : "POST",
            "data" : {
                "_token" : $("meta[name='csrf_token']").attr('content')
            },
            columns : [
                {data : 'id', name : 'id'},
                {data : 'title', name : 'title'},
                {data : 'created_at', name : 'created_at'},
                {data : 'update_at', name : 'update_at'},
                {data : 'action', name : 'action', orderable :false, searchable: false},
                {data : 'action1', name : 'action1', orderable :false, searchable: false},
            ],
            columnDefs : [
                {
                    "render" : function (data, type,row,meta){
                        return <a href="#" class="btn btn-primary btn-sm editTag" id="${row.id}"> <i
                            className='fas fa-pencil-alt'></i> </a>
                    },
                    "targets" :5

                },
                {
                    "render" : function (data,type,row,meta){
                        return <a href="#" class=" btn btn-danger btn-sm deletingTag" id="${rowid}">
                            <i
                                className='far fa-trash-alt'></i> </a>
                    },
                }
            ]
        }
    })
})
