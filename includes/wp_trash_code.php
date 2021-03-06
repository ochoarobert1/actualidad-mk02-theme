<?php
if (function_exists("register_field_group")) {
    register_field_group(array(
        'id' => 'acf_banner-footer',
        'title' => 'Banner Footer',
        'fields' => array(
            array(
                'key' => 'field_568d8aa7f27a8',
                'label' => 'Banner ID',
                'name' => 'banner-home',
                'type' => 'number',
                'default_value' => 1,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'side',
            'layout' => 'default',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_banners-listado',
        'title' => 'Banners Listado',
        'fields' => array(
            array(
                'key' => 'field_568d91f89a19b',
                'label' => 'ID Banners',
                'name' => 'banners-listado',
                'type' => 'text',
                'instructions' => 'Ingresa el los IDs de los banners a mostrar en el listado de home, separado por coma (,)',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_type',
                    'operator' => '==',
                    'value' => 'front_page',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'side',
            'layout' => 'default',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_bases-legales',
        'title' => 'Bases Legales',
        'fields' => array(
            array(
                'key' => 'field_568d6152573c2',
                'label' => 'Bases Legales',
                'name' => 'bases-concurso',
                'type' => 'file',
                'save_format' => 'object',
                'library' => 'all',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'concursos',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'side',
            'layout' => 'default',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_descripcion-horario',
        'title' => 'Descripción Horario',
        'fields' => array(
            array(
                'key' => 'field_56798f6975407',
                'label' => 'descripción',
                'name' => 'descripcion-horario',
                'type' => 'text',
                'required' => 1,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'none',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'programacion',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'side',
            'layout' => 'default',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_destacar',
        'title' => 'Destacar',
        'fields' => array(
            array(
                'key' => 'field_56819653e7dc2',
                'label' => 'Destacada Home',
                'name' => 'noticia-destacada',
                'type' => 'true_false',
                'message' => 'Marcar como destacada en el Home',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_5697dba26a572',
                'label' => 'Breaking News',
                'name' => 'noticia-breaking-news',
                'type' => 'true_false',
                'message' => 'Marcar como Breaking News',
                'default_value' => 0,
            ),
            array(
                'key' => 'field_56ec5534aae8f',
                'label' => 'Marcar como Video',
                'name' => 'noticia_video',
                'type' => 'true_false',
                'message' => 'Marcar esta noticia para aparecer en secciones de Video',
                'default_value' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'noticias',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                    'order_no' => 0,
                    'group_no' => 1,
                ),
            ),
        ),
        'options' => array(
            'position' => 'side',
            'layout' => 'default',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_horario-fin',
        'title' => 'Horario Fin',
        'fields' => array(
            array(
                'key' => 'field_567832fb96be0',
                'label' => 'Hora',
                'name' => 'hora-fin',
                'type' => 'select',
                'required' => 1,
                'choices' => array(
                    0 => 0,
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    6 => 6,
                    7 => 7,
                    8 => 8,
                    9 => 9,
                    10 => 10,
                    11 => 11,
                    12 => 12,
                    13 => 13,
                    14 => 14,
                    15 => 15,
                    16 => 16,
                    17 => 17,
                    18 => 18,
                    19 => 19,
                    20 => 20,
                    21 => 21,
                    22 => 22,
                    23 => 23,
                    24 => 24,
                ),
                'default_value' => 0,
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_567833628311f',
                'label' => 'Minuto',
                'name' => 'minuto-fin',
                'type' => 'select',
                'required' => 1,
                'choices' => array(
                    0 => 0,
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    6 => 6,
                    7 => 7,
                    8 => 8,
                    9 => 9,
                    10 => 10,
                    11 => 11,
                    12 => 12,
                    13 => 13,
                    14 => 14,
                    15 => 15,
                    16 => 16,
                    17 => 17,
                    18 => 18,
                    19 => 19,
                    20 => 20,
                    21 => 21,
                    22 => 22,
                    23 => 23,
                    24 => 24,
                    25 => 25,
                    26 => 26,
                    27 => 27,
                    28 => 28,
                    29 => 29,
                    30 => 30,
                    31 => 31,
                    32 => 32,
                    33 => 33,
                    34 => 34,
                    35 => 35,
                    36 => 36,
                    37 => 37,
                    38 => 38,
                    39 => 39,
                    40 => 40,
                    41 => 41,
                    42 => 42,
                    43 => 43,
                    44 => 44,
                    45 => 45,
                    46 => 46,
                    47 => 47,
                    48 => 48,
                    49 => 49,
                    50 => 50,
                    51 => 51,
                    52 => 52,
                    53 => 53,
                    54 => 54,
                    55 => 55,
                    56 => 56,
                    57 => 57,
                    58 => 58,
                    59 => 59,
                    60 => 60,
                ),
                'default_value' => 0,
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'programacion',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'side',
            'layout' => 'default',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_horario-inicio',
        'title' => 'Horario Inicio',
        'fields' => array(
            array(
                'key' => 'field_567332171f16f',
                'label' => 'Dias',
                'name' => 'dia-inicio',
                'type' => 'select',
                'choices' => array(
                    'Lunes' => 'Lunes',
                    'Martes' => 'Martes',
                    'Miércoles' => 'Miércoles',
                    'Jueves' => 'Jueves',
                    'Viernes' => 'Viernes',
                    'Sábado' => 'Sábado',
                    'Domingo' => 'Domingo',
                ),
                'default_value' => 'Lunes',
                'allow_null' => 0,
                'multiple' => 1,
            ),
            array(
                'key' => 'field_56732f334df6b',
                'label' => 'Hora',
                'name' => 'hora-inicio',
                'type' => 'select',
                'required' => 1,
                'choices' => array(
                    0 => 0,
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    6 => 6,
                    7 => 7,
                    8 => 8,
                    9 => 9,
                    10 => 10,
                    11 => 11,
                    12 => 12,
                    13 => 13,
                    14 => 14,
                    15 => 15,
                    16 => 16,
                    17 => 17,
                    18 => 18,
                    19 => 19,
                    20 => 20,
                    21 => 21,
                    22 => 22,
                    23 => 23,
                    24 => 24,
                ),
                'default_value' => 0,
                'allow_null' => 0,
                'multiple' => 0,
            ),
            array(
                'key' => 'field_567330134df6c',
                'label' => 'Minuto',
                'name' => 'minuto-inicio',
                'type' => 'select',
                'required' => 1,
                'choices' => array(
                    0 => 0,
                    1 => 1,
                    2 => 2,
                    3 => 3,
                    4 => 4,
                    5 => 5,
                    6 => 6,
                    7 => 7,
                    8 => 8,
                    9 => 9,
                    10 => 10,
                    11 => 11,
                    12 => 12,
                    13 => 13,
                    14 => 14,
                    15 => 15,
                    16 => 16,
                    17 => 17,
                    18 => 18,
                    19 => 19,
                    20 => 20,
                    21 => 21,
                    22 => 22,
                    23 => 23,
                    24 => 24,
                    25 => 25,
                    26 => 26,
                    27 => 27,
                    28 => 28,
                    29 => 29,
                    30 => 30,
                    31 => 31,
                    32 => 32,
                    33 => 33,
                    34 => 34,
                    35 => 35,
                    36 => 36,
                    37 => 37,
                    38 => 38,
                    39 => 39,
                    40 => 40,
                    41 => 41,
                    42 => 42,
                    43 => 43,
                    44 => 44,
                    45 => 45,
                    46 => 46,
                    47 => 47,
                    48 => 48,
                    49 => 49,
                    50 => 50,
                    51 => 51,
                    52 => 52,
                    53 => 53,
                    54 => 54,
                    55 => 55,
                    56 => 56,
                    57 => 57,
                    58 => 58,
                    59 => 59,
                    60 => 60,
                ),
                'default_value' => 0,
                'allow_null' => 0,
                'multiple' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'programacion',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'side',
            'layout' => 'default',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_presentador',
        'title' => 'Presentador',
        'fields' => array(
            array(
                'key' => 'field_568d50cbe588e',
                'label' => 'presentador',
                'name' => 'presentador-programa',
                'type' => 'text',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'programacion',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_sinopsis',
        'title' => 'Sinopsis',
        'fields' => array(
            array(
                'key' => 'field_567c0e1c2a1f7',
                'label' => 'sinopsis',
                'name' => 'sinopsis-noticia',
                'type' => 'wysiwyg',
                'default_value' => '',
                'toolbar' => 'full',
                'media_upload' => 'no',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'noticias',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'economia',
                    'order_no' => 0,
                    'group_no' => 1,
                ),
            ),
        ),
        'options' => array(
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));
    register_field_group(array(
        'id' => 'acf_widget-en-vivo',
        'title' => 'Widget en Vivo',
        'fields' => array(
            array(
                'key' => 'field_5696d1d38670e',
                'label' => 'Imagen Presentador',
                'name' => 'en-vivo-imagen-presentador',
                'type' => 'image',
                'required' => 1,
                'save_format' => 'url',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'programacion',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array(
            'position' => 'acf_after_title',
            'layout' => 'default',
            'hide_on_screen' => array(
            ),
        ),
        'menu_order' => 0,
    ));
}
