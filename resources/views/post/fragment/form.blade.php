<div class="form-group">
    {!! FORM::label('name','Nombre del post') !!}
    {!! FORM::text('name',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! FORM::label('category_id','Categoria') !!}
    {!! FORM::select('category_id',$categories,null,['placeholder'=>'Elegi una categoria']) !!}
</div>
<div class="form-group">
    {!! FORM::label('tags_name','tags separado por ,') !!}
    {!! FORM::text('tags_name',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! FORM::label('url','Url de imagen') !!}
    {!! FORM::text('url',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! FORM::submit('Enviar') !!}
</div>