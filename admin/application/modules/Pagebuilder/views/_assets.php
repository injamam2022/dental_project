<style>
.pb-admin .pb-topbar{display:flex;flex-wrap:wrap;align-items:center;justify-content:space-between;gap:10px;margin-bottom:16px}
.pb-admin .pb-topbar h2{margin:0;font-size:22px;line-height:1.3}
.pb-admin .pb-topbar .pb-url{font-size:13px;color:#777;word-break:break-all}
.pb-admin .pb-badge{display:inline-block;padding:3px 10px;border-radius:999px;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.05em;vertical-align:middle}
.pb-admin .pb-badge--published{background:#e3f6e8;color:#1d7a3a}
.pb-admin .pb-badge--draft{background:#fff1d6;color:#8a5a00}
.pb-admin .pb-badge--hidden{background:#eee;color:#777}

/* Section list */
.pb-admin .pb-sections{list-style:none;margin:0;padding:0}
.pb-admin .pb-row{display:flex;align-items:center;gap:12px;background:#fff;border:1px solid #e1e4e8;border-left:4px solid #5b2f1d;border-radius:6px;padding:10px 12px;margin-bottom:6px}
.pb-admin .pb-row.is-hidden{opacity:.55;border-left-color:#bbb;background:#fafafa}
.pb-admin .pb-row.ui-sortable-helper{box-shadow:0 10px 24px rgba(0,0,0,.18)}
.pb-admin .pb-row-placeholder{border:2px dashed #b78333;border-radius:6px;height:64px;margin-bottom:6px;background:#fffaf0}
.pb-admin .pb-handle{cursor:grab;color:#999;font-size:18px;padding:4px}
.pb-admin .pb-row__icon{flex:0 0 38px;height:38px;border-radius:8px;background:#f5ede8;color:#5b2f1d;display:flex;align-items:center;justify-content:center;font-size:17px}
.pb-admin .pb-row__thumb{flex:0 0 64px;height:42px;border-radius:4px;background:#eee center/cover no-repeat}
.pb-admin .pb-row__main{flex:1;min-width:0}
.pb-admin .pb-row__title{font-weight:700;color:#222;display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.pb-admin .pb-row__meta{font-size:12px;color:#888;display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.pb-admin .pb-row__actions{display:flex;gap:4px;flex-wrap:wrap;justify-content:flex-end}
.pb-admin .pb-row__actions form{display:inline}
.pb-admin .pb-insert{text-align:center;height:0;position:relative;margin:-3px 0 3px}
.pb-admin .pb-insert button{position:relative;top:-11px;opacity:0;transition:opacity .15s;border-radius:999px;padding:0 10px;font-size:11px;line-height:20px;background:#b78333;border:0;color:#fff}
.pb-admin .pb-sections li:hover + .pb-insert button,.pb-admin .pb-insert:hover button{opacity:1}
.pb-admin .pb-empty{border:2px dashed #ddd;border-radius:8px;padding:40px 20px;text-align:center;color:#888}
.pb-admin .pb-save-state{font-size:12px;color:#1d7a3a;margin-left:8px;display:none}

/* Palette */
.pb-palette{display:grid;grid-template-columns:repeat(auto-fill,minmax(170px,1fr));gap:10px}
.pb-palette button{display:flex;flex-direction:column;align-items:flex-start;gap:6px;text-align:left;background:#fff;border:1px solid #e1e4e8;border-radius:8px;padding:14px;cursor:pointer;transition:border-color .15s,box-shadow .15s;white-space:normal}
.pb-palette button:hover{border-color:#b78333;box-shadow:0 4px 14px rgba(183,131,51,.2)}
.pb-palette .fa{font-size:22px;color:#5b2f1d}
.pb-palette strong{font-size:14px;color:#222}
.pb-palette small{font-size:12px;color:#777;line-height:1.4}

/* Section editor */
.pb-admin .pb-fieldset{background:#fff;border:1px solid #e1e4e8;border-radius:6px;padding:16px 18px;margin-bottom:16px}
.pb-admin .pb-fieldset > legend{font-size:15px;font-weight:700;border:0;margin:0 0 10px;width:auto;padding:0}
.pb-admin .pb-field{margin-bottom:14px}
.pb-admin .pb-field > label{display:block;font-weight:600;margin-bottom:5px}
.pb-admin .pb-field .help-block{margin:4px 0 0;font-size:12px}
.pb-admin .pb-code{font-family:Consolas,Menlo,monospace;font-size:12px}
.pb-admin .pb-img-field{display:flex;gap:12px;align-items:flex-start}
.pb-admin .pb-img-preview{flex:0 0 140px;height:90px;border-radius:6px;background:#f3f3f3;border:1px solid #e1e1e1;overflow:hidden;display:flex;align-items:center;justify-content:center}
.pb-admin .pb-img-preview img{width:100%;height:100%;object-fit:cover}
.pb-admin .pb-img-preview .pb-img-empty{display:none;color:#aaa;font-size:12px}
.pb-admin .pb-img-preview.is-empty .pb-img-empty{display:block}
.pb-admin .pb-img-controls{flex:1;min-width:0}
.pb-admin .pb-img-controls .pb-img-value{margin-top:8px}
.pb-admin .pb-img-pick{position:relative;overflow:hidden;margin:0}
.pb-admin .pb-img-pick input[type=file]{position:absolute;inset:0;opacity:0;cursor:pointer;width:100%}

/* Repeater */
.pb-admin .pb-items{list-style:none;margin:0 0 10px;padding:0}
.pb-admin .pb-item{border:1px solid #e1e4e8;border-radius:6px;margin-bottom:8px;background:#fcfcfd}
.pb-admin .pb-item__head{display:flex;align-items:center;gap:10px;padding:8px 10px;cursor:pointer;user-select:none}
.pb-admin .pb-item__num{flex:0 0 26px;height:26px;border-radius:50%;background:#5b2f1d;color:#fff;font-size:12px;font-weight:700;display:flex;align-items:center;justify-content:center}
.pb-admin .pb-item__title{flex:1;min-width:0;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.pb-admin .pb-item__title.is-empty{color:#aaa;font-weight:400;font-style:italic}
.pb-admin .pb-item__body{padding:12px 14px 4px;border-top:1px solid #eee;display:none;background:#fff}
.pb-admin .pb-item.is-open .pb-item__body{display:block}
.pb-admin .pb-item.is-open .pb-item__chev{transform:rotate(90deg)}
.pb-admin .pb-item__chev{transition:transform .15s;color:#999}
.pb-admin .pb-sticky-save{position:sticky;bottom:0;z-index:20;background:rgba(255,255,255,.96);border-top:1px solid #e1e4e8;padding:12px 0;margin-top:10px}
</style>
<script>
/* Image fields: instant preview of the chosen file + "Remove". Called once jQuery is ready. */
function pbBindImageFields(root) {
	var $ = window.jQuery;
	$(root).on('change', '.pb-img-file', function () {
		var $w = $(this).closest('.pb-img-field'), file = this.files && this.files[0];
		if (!file) { return; }
		if (file.size > 20 * 1024 * 1024) { alert('This image is larger than 20 MB. Please choose a smaller file.'); this.value = ''; return; }
		var reader = new FileReader();
		reader.onload = function (e) {
			$w.find('.pb-img-preview').removeClass('is-empty').find('img').remove().end().prepend('<img src="' + e.target.result + '" alt="">');
			$w.find('.pb-img-remove').show();
		};
		reader.readAsDataURL(file);
	});
	$(root).on('click', '.pb-img-remove', function () {
		var $w = $(this).closest('.pb-img-field');
		$w.find('.pb-img-value').val('').trigger('change');
		$w.find('.pb-img-file').val('');
		$w.find('.pb-img-preview').addClass('is-empty').find('img').remove();
		$(this).hide();
	});
}
</script>
