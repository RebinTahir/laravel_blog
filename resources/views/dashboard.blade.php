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
                data.append("note", $("#note").val());

                if ($('#img')[0].files[0] == undefined) {
                    // no img provided
                    data.append("img", null);
                } else {
                    data.append("img", files);
                }

                fd.append('img', files);
                fd.append('titleen', jQuery('#titleen').val());
                fd.append('titlear', jQuery('#titlear').val());
                fd.append('titlekr', jQuery('#titlekr').val());

                fd.append('bodyen', jQuery('#bodyen').val());
                fd.append('bodyar', jQuery('#bodyar').val());
                fd.append('bodykr', jQuery('#bodykr').val());
                fd.append('youtube', jQuery('#youtube').val());

                $.ajax({
                    url: "{{ route('newpost') }}",
                    type: 'post',
                    data: fd,
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
function postdtb() { 


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

        </script>


    </div>
</x-app-layout>
