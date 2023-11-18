@extends('master')

@section('title', 'Kullanıcı Detayları')
    
@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    @if ($user->image == null)
                        <a href="javascript:;" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#logoUploadModal"><i class="fas fa-camera"></i> Logo Yükle</a>
                    @endif
                    <img src="{{$user->image}}" alt="" width="100%">
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="logoUploadModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Logo Yükle</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="address" class="form-label">Bilgisayardan Seç</label>
                    <input type="file" id="file" class="form-control" onchange="upload()">
                    <input type="hidden" id="logo">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
              <button type="button" class="btn btn-primary" onclick="saveLogo({{$user->id}})">Kaydet</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('script')
    <script>
        function upload() {
            var formData = new FormData();
            var fileInput = document.getElementById('file');
            formData.append('file', fileInput.files[0]);

            axios.post('/upload', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(function (res) {
                toastr[res.data.type](res.data.message)
                if(res.data.status){
                    $("#logo").val(res.data.url);
                }
            });
    }

    function saveLogo(id){
        var logo = $("#logo").val();
        axios.post('/user/save-logo', {'logo': logo, 'id': id})
            .then(res => {
                toastr[res.data.type](res.data.message);
               if(res.data.status){
                setInterval(() => {
                    window.location.reload();
                }, 500);
               } 
            });
    }
    </script>
@endsection