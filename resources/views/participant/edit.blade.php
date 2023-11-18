@extends('master')

@section('title', 'Katılımcıyı Düzenle')
    
@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title border-bottom pb-3">Katılımcıyı Düzenle</h4>
                    
                    <form action="javascript:void(0)" id="participantForm">
                        <div class="mb-3">
                            <label for="type" class="form-label">Katılımcı Türü</label>
                            <select name="type" id="type" class="form-control">
                                <option value="0">Seçin...</option>
                                @foreach ($types as $item)
                                    <option {{$item->id == $participant->type ? 'selected':''}} value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">İsim</label>
                            <input type="text" class="form-control" id="name"  name="name" value="{{$participant->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-posta</label>
                            <input type="text" class="form-control" id="email"  name="email" value="{{$participant->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefon</label>
                            <input type="text" class="form-control" id="phone"  name="phone" value="{{$participant->phone}}">
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">Cinsiyet</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="0">Seçin...</option>
                                        <option value="1" {{$participant->gender == 1 ? 'selected':''}}>Erkek</option>
                                        <option value="2" {{$participant->gender == 2 ? 'selected':''}} >Kadın</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="birthdate" class="form-label">Doğum Tarihi</label>
                                    <input type="date" class="form-control" id="birthdate"  name="birthdate" value="{{$participant->birthdate}}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="blood_group" class="form-label">Kan Grubu</label>
                                    <select name="blood_group" id="blood_group" class="form-control">
                                        <option value="0">Seçin...</option>
                                        <option value="1" {{$participant->blood_group == 1 ? 'selected':''}}>A RH +</option>
                                        <option value="2" {{$participant->blood_group == 2 ? 'selected':''}}>A RH -</option>
                                        <option value="3" {{$participant->blood_group == 3 ? 'selected':''}}>B RH +</option>
                                        <option value="4" {{$participant->blood_group == 4 ? 'selected':''}}>B RH -</option>
                                        <option value="5" {{$participant->blood_group == 5 ? 'selected':''}}>AB RH +</option>
                                        <option value="6" {{$participant->blood_group == 6 ? 'selected':''}}>AB RH -</option>
                                        <option value="7" {{$participant->blood_group == 7 ? 'selected':''}}>0 RH +</option>
                                        <option value="8" {{$participant->blood_group == 8 ? 'selected':''}}>0 RH -</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="height" class="form-label">Boy</label>
                                    <input type="text" class="form-control" id="height"  name="height" value="{{$participant->height}}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="weight" class="form-label">Kilo</label>
                                    <input type="text" class="form-control" id="weight"  name="weight" value="{{$participant->weight}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="country" class="form-label">Ülke</label>
                                    <input type="text" class="form-control" id="country"  name="country" value="{{$participant->country}}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="city" class="form-label">İl</label>
                                    <input type="text" class="form-control" id="city"  name="city" value="{{$participant->city}}">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <label for="district" class="form-label">İlçe</label>
                                    <input type="text" class="form-control" id="district"  name="district" value="{{$participant->district}}">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Adres</label>
                            <input type="text" class="form-control" id="address"  name="address" value="{{$participant->address}}">
                        </div>
                        <button type="submit" class="btn btn-primary float-end" onclick="updateParticipant({{$participant->id}})"><i class="fas fa-save"></i> Oluştur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function updateParticipant(id){
            axios.post('/participant/update', $('#participantForm').serialize()  + '&id=' + id)
                .then(res => {
                    toastr[res.data.type](res.data.message);
                   if(res.data.status){
                    setInterval(() => {
                        window.location.assign('/participant');
                    }, 500);
                   } 
                });
        }
    </script>
@endsection