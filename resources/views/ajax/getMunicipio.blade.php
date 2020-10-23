{{Form::select('id_municipio', $getMunicipio, null, ['class'=>"form-control", 'placeholder'=>"Muncípio"]) }}
                                        @if($errors->has('id_municipio'))
                                        <span class="text-danger">{{$errors->first('id_municipio')}}</span>
                                        @endif