<data-grid-wrapper
    base-url={{$baseUrl}}
    :columns="{{json_encode($columns)}}"
    :rows="{{json_encode($rows)}}"
    :mass-actions="{{json_encode([['action' => 'massDelete', 'label' => 'Delete']])}}"
></data-grid-wrapper>
