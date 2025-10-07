@extends('layouts.admin')

@section('content')
{{-- ✅ Token CSRF para upload no TinyMCE --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-md p-6 sm:p-8 mt-8">
    <div class="flex justify-between items-center mb-8 border-b pb-4">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 flex items-center gap-3">
            <i class="fas fa-pen text-blue-500"></i>
            <span>{{ isset($noticia) ? 'Editar Notícia' : 'Criar Nova Notícia' }}</span>
        </h1>

        <a href="{{ route('admin.dashboard') }}"
            class="text-sm bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-4 py-2 rounded-lg transition flex items-center gap-2">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>

    <form
        action="{{ isset($noticia) ? route('admin.noticias.update', $noticia->id) : route('admin.noticias.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6">
        @csrf
        @if(isset($noticia))
            @method('PUT')
        @endif

        <!-- Título -->
        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Título da Notícia</label>
            <input type="text"
                name="titulo"
                value="{{ old('titulo', $noticia->titulo ?? '') }}"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
                placeholder="Digite o título da notícia"
                required>
        </div>

        <!-- Resumo -->
        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Resumo (máx. 500 caracteres)</label>
            <textarea
                name="resumo"
                rows="3"
                maxlength="500"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition resize-none"
                placeholder="Um pequeno resumo para aparecer na listagem"
                required>{{ old('resumo', $noticia->resumo ?? '') }}</textarea>
        </div>

        <!-- Imagem de Capa -->
        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Imagem de Capa</label>
            <input type="file" name="imagem" accept="image/*"
                   class="w-full border border-gray-300 rounded-lg p-2 file:mr-4 file:py-2 file:px-4
                          file:rounded-md file:border-0 file:text-sm file:font-semibold
                          file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            @if(isset($noticia) && $noticia->imagem)
                <div class="mt-3">
                    <img src="{{ asset('storage/'.$noticia->imagem) }}" alt="Imagem atual"
                         class="rounded-lg shadow-md max-w-xs">
                    <p class="text-xs text-gray-500 mt-1">Imagem atual. Enviar um novo arquivo substituirá esta.</p>
                </div>
            @endif
        </div>

        <!-- Editor Completo -->
        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Conteúdo Personalizável (texto, imagens, vídeos, blocos)</label>
            <textarea name="conteudo" id="editor" rows="15"
                class="w-full border border-gray-300 rounded-lg p-3"
                required>{{ old('conteudo', $noticia->conteudo ?? '') }}</textarea>
        </div>

        <!-- Status -->
        <div>
            <label class="block text-sm font-semibold mb-2 text-gray-700">Status</label>
            <select
                name="status"
                class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                <option value="rascunho" {{ old('status', $noticia->status ?? '') == 'rascunho' ? 'selected' : '' }}>📝 Rascunho</option>
                <option value="publicada" {{ old('status', $noticia->status ?? '') == 'publicada' ? 'selected' : '' }}>✅ Publicada</option>
            </select>
        </div>

        <!-- Botões -->
        <div class="flex justify-end items-center pt-4">
            <a href="{{ route('admin.dashboard') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-6 py-3 rounded-lg transition mr-4 flex items-center gap-2">
                <i class="fas fa-times"></i> Cancelar
            </a>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow-md transition flex items-center gap-2">
                <i class="fas fa-save"></i> Salvar Notícia
            </button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/tinymce@7.2.1/tinymce.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  tinymce.init({
    selector: '#editor',
    height: 600,
    menubar: 'file edit view insert format tools table help',
    plugins: [
      'advlist autolink lists link image charmap preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table codesample emoticons hr pagebreak wordcount'
    ],
    toolbar:
      'undo redo | formatselect | bold italic underline strikethrough forecolor backcolor | ' +
      'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ' +
      'link image media table | removeformat | code fullscreen preview',
    branding: false,
    automatic_uploads: true,
    file_picker_types: 'image media',
    paste_data_images: true,
    language_url: 'https://cdn.jsdelivr.net/npm/tinymce-i18n/langs/pt_BR.js',
    language: 'pt_BR',
    relative_urls: false,
    remove_script_host: false,
    convert_urls: false,
    images_upload_url: '{{ route("admin.upload.tinymce") }}',

    images_upload_handler: function (blobInfo, progress) {
      return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route("admin.upload.tinymce") }}');
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        xhr.setRequestHeader('X-CSRF-TOKEN', token);

        xhr.upload.onprogress = function (e) {
          progress(e.loaded / e.total * 100);
        };

        xhr.onload = function() {
          if (xhr.status < 200 || xhr.status >= 300) {
            reject({ message: 'Erro HTTP: ' + xhr.status });
            return;
          }
          const json = JSON.parse(xhr.responseText);
          if (!json || typeof json.location !== 'string') {
            reject({ message: 'Resposta inválida do servidor' });
            return;
          }
          resolve(json.location);
        };

        xhr.onerror = function() {
          reject({ message: 'Erro de rede' });
        };

        const formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
      });
    },

    /** 🔁 ESSA É A PARTE CRUCIAL */
    setup: function (editor) {
      editor.on('change', function () {
        editor.save();
      });
    },
    init_instance_callback: function (editor) {
      const form = editor.getElement().closest('form');
      if (form) {
        form.addEventListener('submit', function () {
          editor.save(); // 🔥 garante que o conteúdo do editor vá junto no POST
        });
      }
    },

    /** Aparência do conteúdo */
    content_style: `
      body { font-family: "Inter", sans-serif; font-size: 16px; line-height: 1.7; color: #333; padding: 1rem; }
      h1,h2,h3,h4 { color: #1e3a8a; font-weight: 700; margin-top: 1rem; }
      img, video { max-width: 100%; border-radius: 10px; margin: 1rem 0; }
      a { color: #2563eb; text-decoration: underline; }
      table { border-collapse: collapse; width: 100%; margin: 1rem 0; }
      td, th { border: 1px solid #ddd; padding: 8px; }
      blockquote { border-left: 4px solid #93c5fd; margin: 1rem 0; padding-left: 1rem; color: #555; font-style: italic; }
      pre { background: #f3f4f6; padding: 10px; border-radius: 6px; }
    `
  });
});
</script>

@endsection
