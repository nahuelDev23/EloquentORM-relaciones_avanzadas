<div class="form-group">
    {!! FORM::label('name','Nombre del post') !!}
    {!! FORM::text('name',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! FORM::label('name','Nombre del post') !!}
    {!! FORM::select('category_id',[1=>'Informatica',2=>'Paranormal'],null,['placeholder'=>'Elegi una categoria']) !!}
</div>
<div class="form-group">
    {!! FORM::label('url','Url de imagen') !!}
    {!! FORM::text('url',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! FORM::submit('Enviar') !!}
</div>