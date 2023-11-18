@extends('master')

@section('title', 'Personeller')
    
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title border-bottom pb-3">Personeller</h4>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Firma/Kurum</th>
                            <th scope="col">İsim</th>
                            <th scope="col">E-posta</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">Konum</th>
                            <th scope="col">Durum</th>
                            <th scope="col">İşlem</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)
                              <tr>
                                <td>
                                    {{$user->id}}
                                </td>
                                <td>
                                    {{$user->company ?? "-"}}
                                </td>
                                <td>
                                    {{$user->name ?? "-"}}
                                </td>
                                <td>
                                    {{$user->email ?? "-"}}
                                </td>
                                <td>
                                    {{$user->phone ?? "-"}}
                                </td>
                                <td>
                                    {{$user->district.'/'.$user->city.'/'.$user->country}}
                                </td>
                                <td>
                                    @if ($user->status == 1)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-danger">Pasif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/user/detail/{{$user->id}}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" title="Detaylar"><i class="fas fa-eye"></i></a>
                                    <a href="javascript:;" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#changePasswordModal{{$user->id}}" data-bs-toggle="tooltip" title="Şifre Değiştir"><i class="fas fa-key"></i></a>
                                    <a href="/user/edit/{{$user->id}}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" title="Düzenle"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:;" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" title="Sil" onclick="removeStaff({{$user->id}})"><i class="fas fa-trash"></i></a>
                                </td>
                              </tr>

                              <div class="modal fade" id="changePasswordModal{{$user->id}}" tabindex="-1" >
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="">Şifre Değiştir</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="newPassword" class="form-label">Yeni Şifre</label>
                                            <input type="text" class="form-control" id="newPassword{{$user->id}}"  name="newPassword">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
                                      <button type="button" class="btn btn-primary" onclick="changePassword({{$user->id}})">Şifre Değiştir</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function changePassword(id){
            var password = $('#newPassword'+id).val();
            axios.post('/user/change-password', {'password': password, 'id': id})
                .then(res => {
                    toastr[res.data.type](res.data.message);
                   if(res.data.status){
                    setInterval(() => {
                        window.location.assign('/user');
                    }, 500);
                   } 
                });
        }

        function removeStaff(id){
            axios.post('/user/remove', {'id': id})
                .then(res => {
                    toastr[res.data.type](res.data.message);
                   if(res.data.status){
                    setInterval(() => {
                        window.location.assign('/user');
                    }, 500);
                   } 
                });
        }
    </script>
@endsection