@php

    $edit_tag = $view_tag = $delete_tag = 'button';
    $edit_link = $view_link = $delete_link = 'data-href';

    if(isset($edit_tag_type) && $edit_tag_type == 'anchor') {
        $edit_tag = 'a';
        $edit_link = 'href';
    }
    if(isset($view_tag_type) && $view_tag_type == 'anchor') {
        $view_tag = 'a';
        $view_link = 'href';
    }
    if(isset($delete_tag_type) && $delete_tag_type == 'anchor') {
        $delete_tag = 'a';
        $delete_link = 'href';
    }

@endphp
<div class="action-tds-btn" style="display:flex;align-items:center;gap:.5rem;">
    @if(isset($can_update) && $can_update == true)
        <{{$edit_tag}} 
            {{$edit_link}}="{{$edit_action ?? '#'}}" 
            @if(isset($data_id)) data-id="{{$data_id}}" @endif 
            @if(isset($data_name)) data-name="{{$data_name}}" @endif 
            @if(isset($data_is_publish)) data-is_publish="{{$data_is_publish}}" @endif 
            @if(isset($data_display_name)) data-display_name="{{$data_display_name}}" @endif 
            @if(isset($data_type)) data-type="{{$data_type}}" @endif 
            @if(isset($extra_attributes) && !empty($extra_attributes))
            @foreach($extra_attributes as $attr => $value)
            data-{{$attr}}="{{ $value }}"
            @endforeach
            @endif
            class="btn btn-xs btn-primary tippy-tooltip {{$editBtnClass ?? ''}}" 
            @if(isset($edit_modal_container) && !empty($edit_modal_container)) data-container="{{$edit_modal_container}}" @endif 
            data-tippy-content="@lang('messages.edit')">
            Edit
        </{{$edit_tag}}>
    @endif
    @if(isset($can_view) && $can_view == true)
        <{{$view_tag}} 
            {{$view_link}}="{{$view_action ?? '#'}}" 
            class="btn btn-md btn-white-bg btn-matat tippy-tooltip {{$viewBtnClass ?? ''}}" 
            data-tippy-content="@lang('messages.view')" data-tippy-theme="info">
            View
        </{{$view_tag}}>
    @endif
    @if(isset($can_delete) && $can_delete == true)
        <{{$delete_tag}} 
            @if(isset($del_tabindex)) tabindex="{{$del_tabindex}}" @endif 
            {{$delete_link}}="{{$delete_action ?? '#'}}" 
            @if(isset($data_id)) data-id="{{$data_id}}" @endif 
            @if(isset($data_name)) data-name="{{$data_name}}" @endif 
            class="btn btn-xs btn-danger text-red tippy-tooltip {{$deleteBtnClass ?? ''}}" 
            @if(isset($data_business)) data-business-name="{{$data_business}}" @endif 
            @if(isset($data_text)) data-text="{{$data_text}}" @endif 
            @if(isset($extra_attributes) && !empty($extra_attributes))
            @foreach($extra_attributes as $attr => $value)
            data-{{$attr}}="{{ $value }}"
            @endforeach
            @endif
            data-tippy-content="@lang('messages.delete')" data-tippy-theme="danger">
            Delete
        </{{$delete_tag}}>
    @endif
</div>