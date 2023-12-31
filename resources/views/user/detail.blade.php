@extends('master')

@section('title', 'Kullanıcı Detayları')
    
@section('content')
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="col-12">
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
            <div class="row mb-4">
                <div class="col-12">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Firma/Kurum Adı:</span>
                            <span>{{$user->company}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">İsim:</span>
                            <span>{{$user->name}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">E-posta:</span>
                            <span>{{$user->email}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Telefon:</span>
                            <span>{{$user->phone}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Konum:</span>
                            <span>{{$user->district.'/'.$user->city.'/'.$user->country}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Adres:</span>
                            <span>{{$user->address}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Durum:</span>
                            <span>{{$user->status == 1 ? 'Aktif' : 'Pasif'}}</span>
                        </li>
                      </ul>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action " aria-current="true">
                          Düzenle
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            Şifre Değiştir
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            Logo Değiştir
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            Belge yükle
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            Ödeme Ekle
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            Bakiye Ekle
                        </a>
                        <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                            Kullanıcıyı Sil
                        </a>
                      </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Toplam Proje</p>
                                    <h4 class="mb-0">1,235</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Aktif Proje</p>
                                    <h4 class="mb-0">1,235</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Katılımcı</p>
                                    <h4 class="mb-0">1,235</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Toplam Borç</p>
                                    <h4 class="mb-0">1,235</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Toplam Ödeme</p>
                                    <h4 class="mb-0">1,235</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-muted fw-medium">Toplam Belge</p>
                                    <h4 class="mb-0">1,235</h4>
                                </div>

                                <div class="flex-shrink-0 align-self-center">
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Projeler</h4>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Proje Adı</th>
                                    <th scope="col">Tarihi</th>
                                    <th scope="col">Ülke</th>
                                    <th scope="col">Katılımcı Sayısı</th>
                                  </tr>
                                </thead>
                                <tbody></tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ödeme Kayıtları</h4>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tutar</th>
                                    <th scope="col">Tarih</th>
                                    <th scope="col">Durum</th>
                                  </tr>
                                </thead>
                                <tbody></tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Belgeler</h4>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Belge</th>
                                    <th scope="col">Belge Türü</th>
                                    <th scope="col">Durum</th>
                                  </tr>
                                </thead>
                                <tbody></tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Katılımcılar</h4>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">İsim</th>
                                    <th scope="col">E-posta</th>
                                    <th scope="col">Telefon</th>
                                    <th scope="col">Durum</th>
                                  </tr>
                                </thead>
                                <tbody></tbody>
                              </table>
                        </div>
                    </div>
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