<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        {{-- form --}}
        <div class="grid grid-cols-5 gap-3 px-5">
            <div class="col-span-1 flex flex-col gap-2">
                <div class="flex flex-col gap-2">
                    <label for="titleen">En Title</label>
                    <input type="text" id="titleen" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="titlear">Ar Title</label>
                    <input type="text" id="titlear" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="titlekr">Kr Title</label>
                    <input type="text" id="titlekr" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="bodyen">En Body</label>
                    <input type="text" id="bodyen" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="bodyar">Ar Body</label>
                    <input type="text" id="bodyar" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="bodykr">Kr Body</label>
                    <input type="text" id="bodykr" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="img">img</label>
                    <input type="file" id="img" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="youtube">Youtube</label>
                    <input type="text" id="youtube" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="note">note</label>
                    <textarea id="note" col="5"></textarea>
                </div>
                <button onclick="newpost()" class="bg-blue-500 p-5 hover:bg-green-500 rounded-lg hover:text-white">Submit</button>
            </div>
            <div class="col-span-4">
<div class="flex gap-2">

    <div class="flex flex-col">
        <label for="sdate">start date</label>
        <input type="date" id="sdate" class="p-2 rounded-lg lg" />
    </div>

    <div class="flex flex-col">
        <label for="edate">end date</label>
        <input type="date" id="edate" class="p-2 rounded-lg lg" />
    </div>

    <button onclick="postdtb()" class="p-3 bg-blue-500 rounded-lg">load data</button>


</div>

                <table id="posttable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('ap.titleen') }}</th>
                            <th>{{ __('ap.titlear') }}</th>
                            <th>{{ __('ap.titlekr') }}</th>

                            <th>{{ __('ap.bodyen') }}</th>
                            <th>{{ __('ap.bodyar') }}</th>
                            <th>{{ __('ap.bodykr') }}</th>

                            <th>{{ __('ap.youtube') }}</th>

                            <th>{{ __('ap.img') }}</th>

                            <th>#</th>



                        </tr>
                    </thead>
                    <tbody></tbody>

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

                $.ajax({
                    url: "{{ route('newpost') }}",
                    type: 'post',
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response[1]) {
                            alert("success");
                        } else {
                            alert('failed');
                        }
                    },
                });
            }

// datatable for posts 
var dtb=undefined;

function postdtb() { 
if(dtb == undefined){
dtb = new DataTable("#posttable",{
    ajax:{
        url:"{{route('getposts')}}",
        data:{"sdate":$("#sdate").val(),"edate":$("#edate").val() }
    },
    columns: [
        {
            data: '#',
            render:function(data,type,row){return data.meta + 1 ;  }},
        {data: 'title_en',render:function(data,type,row) {
            return `<input type='text' value='${data.title_en}' id='titleen${row.id}' />`;
        }},
        {data: 'title_ar',render:function(data,type,row) {
            return `<input type='text' value='${data.title_ar}' id='titlear${row.id}' />`;
        }},
        {data: 'title_kr',render:function(data,type,row) {
            return `<input type='text' value='${data.title_kr}' id='titlekr${row.id}' />`;
        }},
        
        
        {data: 'body_en',render:function(data,type,row) {
            return `<input type='text' value='${data.body_en}' id='bodyen${row.id}' />`;
        }},
        {data: 'body_ar',render:function(data,type,row) {
            return `<input type='text' value='${data.body_ar}' id='bodyar${row.id}' />`;
        }},
        {data: 'body_kr',render:function(data,type,row) {
            return `<input type='text' value='${data.body_kr}' id='bodykr${row.id}' />`;
        }},
        
  


        {data: 'extralink',render:function(data,type,row){return `<input type='text' value='${data.extralink}' id='extralink${row.id}'  />`;}},
        {data: 'youtube',render:function(data,type,row){return `<input type='text' value='${data.youtube}' id='youtube${row.id}'  />`;}},
        
        {data: 'note',render:function(data,type,row){return `<input type='text' value='${data.note}' id='note${row.id}'  />`;}},
        
        {data: 'img',render:function(){return `<input type='file'  id='img${row.id}' />`;}},
        
        {data: 'action',render:function (data,type,row) {
            return `<div> 
                <button onclick="updatepost('${row.id}')" class='p-3 bg-blue-500 hover:bg-green-500 rounded-lg'> update </button> 
                <button onclick="deletepost('${row.id}')" class='p-3 bg-red-500 hover:text-white-500 rounded-lg'> delete </button> 
                  </div>`;
        }},
        




    ]
});

}else{
dtb.ajax.reload();

}

 }



            function deletepost(id) {
$.post("{{route('deletepost')}}",{"id":id},(data)=> {
    if(data[1]){
        alert("success");
    }else{
        alert("fail");

    }
});
    
}

function updatepost(id){
    
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

                $.ajax({
                    url: "{{ route('newpost') }}",
                    type: 'post',
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response[1]) {
                            alert("success");
                        } else {
                            alert('failed');
                        }
                    },
                });
}

        </script>


    </div>
</x-app-layout>
