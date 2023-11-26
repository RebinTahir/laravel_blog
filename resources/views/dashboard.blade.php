<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        {{-- form --}}
        <div class="grid grid-cols-6 gap-3 px-5">
            <div class="col-span-1 flex flex-col gap-2 px-5">
                <div class="flex flex-col gap-2">
                    <label for="titleen">En Title</label>
                    <input class="rounded-lg p-2" type="text" id="titleen" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="titlear">Ar Title</label>
                    <input class="rounded-lg p-2" type="text" id="titlear" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="titlekr">Kr Title</label>
                    <input class="rounded-lg p-2" type="text" id="titlekr" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="bodyen">En Body</label>
                    <textarea class="rounded-lg p-2" type="text" id="bodyen"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="bodyar">Ar Body</label>
                    <textarea class="rounded-lg p-2" type="text" id="bodyar"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="bodykr">Kr Body</label>
                    <textarea class="rounded-lg p-2" type="text" id="bodykr"></textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label for="img">img</label>
                    <input class="rounded-lg p-2" type="file" id="img" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="youtube">Youtube</label>
                    <input class="rounded-lg p-2" type="text" id="youtube" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="note">note</label>
                    <textarea id="note" col="5" class="rounded-lg"></textarea>
                </div>
                <button onclick="newpost()"
                    class="rounded-lg bg-blue-500 p-5 hover:bg-green-500 hover:text-white">Submit</button>
            </div>
            <div class="col-span-5 bg-gray-300 p-5">
                <div class="mb-2 flex gap-2">

                    <div class="flex flex-col">
                        <label for="sdate">start date</label>
                        <input type="date" id="sdate" class="lg rounded-lg p-2" />
                    </div>

                    <div class="flex flex-col">
                        <label for="edate">end date</label>
                        <input type="date" id="edate" class="lg rounded-lg p-2" />
                    </div>

                    <button onclick="postdtb()"
                        class="rounded-lg bg-blue-500 p-2 hover:bg-green-500 hover:text-white">load data</button>


                </div>

                <table id="posttable" class="cell-border compact stripe">
                    <thead class="bg-slate-400 p-5">
                        <tr>
                            <th>#</th>
                            <th>{{ __('ap.titleen') }}</th>
                            <th>{{ __('ap.titlear') }}</th>
                            <th>{{ __('ap.titlekr') }}</th>
                            <th>{{ __('ap.bodyen') }}</th>
                            <th>{{ __('ap.bodyar') }}</th>
                            <th>{{ __('ap.bodykr') }}</th>
                            <th>{{ __('ap.extralink') }}</th>
                            <th>{{ __('ap.youtube') }}</th>
                            <th>{{ __('ap.img') }}</th>
                            <th>{{ __('ap.note') }}</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody class="bg-slate-400 p-3"></tbody>

                </table>

            </div>


        </div>


        <script>
            // create new post
            function newpost() {

                let data = new FormData();
                let files = $('#img')[0].files[0];

                data.append("titleen", $("#titleen").val());
                data.append("titlekr", $("#titlekr").val());
                data.append("titlear", $("#titlear").val());
                data.append("bodyen", $("#bodyen").val());
                data.append("bodykr", $("#bodykr").val());
                data.append("bodyar", $("#bodyar").val());
                data.append("youtube", $("#youtube").val());
                data.append("update", false);
                data.append("id", 0);
                data.append("note", $("#note").val());

                if ($('#img')[0].files[0] == undefined) {
                    // no img provided
                    data.append("img", null);
                } else {
                    data.append("img", files);
                }

                $.confirm({
        title: "{{__('ap.newposttitle')}}",
        content: "{{__('ap.newpostinsert')}}",
        useBootstrap: false,
        buttons: {
            confirm: function () {
                                       
                $.ajax({
                    url: "{{ route('newpost') }}",
                    type: 'post',
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response[1]) {
                            $.alert({
    title: 'Operation Alert !',
    content: 'Success!',
});
                        } else {
                            $.alert({
    title: 'Operation Alert !',
    content: 'Failed!',
});
                        }
                    },
                });


            },
            cancel: function () {
                $.alert('Canceled!');
            },
          
        }
    });
             


            }

            // datatable for posts 
            var dtb = undefined;

            function postdtb() {

                if (dtb == undefined) {
                    dtb = new DataTable("#posttable", {
                        scrollX: true,
                        searching: false,
                        "paging": true,
                        "pageLength": 10,
                        buttons: [
        {
            text: 'Reload',
            action: function ( e, dt, node, config ) {
                dt.ajax.reload();
            }
        }
    ],
                        ajax: {
                            url: "{{ route('getposts') }}",
                            data: {
                                "sdate": $("#sdate").val(),
                                "edate": $("#edate").val()
                            },
                            type:'post'
                        },
                        columns: [
                            {
                                data: '#',
                                render: function(data, type, row,meta) {
                                
                                    return meta.row + 1;
                                }
                            },
                            {
                                data: 'title_en',
                                render: function(data, type, row) {
                                    return `<input type='text' value='${row.title_en}' id='titleen${row.id}' />`;
                                }
                            },
                            {
                                data: 'title_ar',
                                render: function(data, type, row) {
                                    return `<input type='text' value='${row.title_ar}' id='titlear${row.id}' />`;
                                }
                            },
                            {
                                data: 'title_kr',
                                render: function(data, type, row) {
                                    return `<input type='text' value='${row.title_kr}' id='titlekr${row.id}' />`;
                                }
                            },


                            {
                                data: 'body_en',
                                render: function(data, type, row) {
                                    return `<input type='text' value='${row.body_en}' id='bodyen${row.id}' />`;
                                }
                            },
                            {
                                data: 'body_ar',
                                render: function(data, type, row) {
                                    return `<input type='text' value='${row.body_ar}' id='bodyar${row.id}' />`;
                                }
                            },
                            {
                                data: 'body_kr',
                                render: function(data, type, row) {
                                    return `<input type='text' value='${row.body_kr}' id='bodykr${row.id}' />`;
                                }
                            },
                            {
                                data: 'extralink',
                                render: function(data, type, row) {
                                    return `<input type='text' value='${row.extralink}' id='extralink${row.id}'  />`;
                                }
                            },
                            {
                                data: 'youtube',
                                render: function(data, type, row) {
                                    return `<input type='text' value='${row.youtube}' id='youtube${row.id}'  />`;
                                }
                            },

                            {
                                data: 'note',
                                render: function(data, type, row) {
                                    return `<input type='text' value='${row.note}' id='note${row.id}'  />`;
                                }
                            },

                            {
                                data: 'img',
                                render: function(data,type,row) {
                                    return `<input type='file'  id='img${row.id}' />`;
                                }
                            },

                            {
                                data: 'action',
                                render: function(data, type, row) {
                                    return `<div class='flex flex-col gap-2'> 
                <button onclick="updatepost('${row.id}')" class='p-3 bg-blue-500 hover:bg-green-500 rounded-lg'> update </button> 
                <button onclick="deletepost('${row.id}')" class='p-3 bg-red-500 hover:text-white-500 rounded-lg'> delete </button> 
                  </div>`;
                                }
                            },





                        ]
                    });

                } else {
                    dtb.ajax.reload();

                }

            }



            function deletepost(id) {
            
                $.confirm({
        title: "{{__('ap.newposttitle')}}",
        content: "{{__('ap.newpostinsert')}}",
        useBootstrap: false,
    buttons: {
        confirm: function () {
            $.post("{{ route('deletepost') }}", {
                    "id": id
                }, (data) => {
                    if (data[1]) {
                        $.alert({
    title: 'Operation Alert !',
    content: 'Success!',
});
                    } else {
                        $.alert({
    title: 'Operation Alert !',
    content: 'Failed!',
});

                    }
                });

        },
        cancel: function () {
            $.alert('Canceled!');
        },
      
    }
});


            }

            function updatepost(id) {

                let data = new FormData();
                let files = $(`#img${id}`)[0].files[0];

                data.append("titleen", $(`#titleen${id}`).val());
                data.append("titlekr", $(`#titlekr${id}`).val());
                data.append("titlear", $(`#titlear${id}`).val());
                data.append("bodyen", $(`#bodyen${id}`).val());
                data.append("bodykr", $(`#bodykr${id}`).val());
                data.append("bodyar", $(`#bodyar${id}`).val());
                data.append("youtube", $(`#youtube${id}`).val());
                data.append("update", true);
                data.append("id", id);
                data.append("note", $(`#note${id}`).val());

                if ($(`#img${id}`)[0].files[0] == undefined) {
                    // no img provided
                    data.append("img", null);
                } else {
                    data.append("img", files);
                }


                $.confirm({
        title: "{{__('ap.newposttitle')}}",
        content: "{{__('ap.newpostinsert')}}",
        useBootstrap: false,
        buttons: {
            confirm: function () {
                $.ajax({
                    url: "{{ route('newpost') }}",
                    type: 'post',
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response[1]) {
                            $.alert({
    title: 'Operation Alert !',
    content: 'Success!',
});
                        } else {
                            $.alert({
    title: 'Operation Alert !',
    content: 'Failed!',
});
                        }
                    },
                });                       
              


            },
            cancel: function () {
                $.alert('Canceled!');
            },
          
        }
    });
             

             
            }
        </script>


    </div>
</x-app-layout>
