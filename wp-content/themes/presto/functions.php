<?php
add_action('wp_enqueue_scripts', 'presto_removeScripts' , 20);
function presto_removeScripts() {
//De-Queuing paresnt color Styles sheet 
wp_dequeue_style( 'default',get_template_directory_uri() .'/css/default.css'); 

//EN-Queing new color Style sheet

 $parent_style = 'parent-style';
 wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
 wp_enqueue_style('purple', get_stylesheet_directory_uri() . '/purple.css');  
}?>
<?php function presto_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'after_setup_theme', 'presto_add_editor_styles' );

//child theme option//
add_action( 'customize_register' , 'presto_child_options' );
function presto_child_options( $wp_customize ) {

$wp_customize->add_section('extra_option', 
    array(
        'title'       => __( 'Extra Option', 'enigma' ),
        'priority'    => 100,
        'panel'=>'enigma_theme_option',
		'capability'=>'edit_theme_options',
    ) 
);
	
$wp_customize->add_setting(
	'scroll_up',
		array(
		'type'=>'theme_mod',
		'sanitize_callback'=>'enigma_sanitize_checkbox',
		'capability'=>'edit_theme_options'
		)
);
$wp_customize->add_control( 'scroll_up', array(
		'label'        => __( 'Check The Box To Enable SCroll Up Arrow', 'enigma' ),
		'type'=>'checkbox',
		'section'    => 'extra_option',
		'settings'   => 'scroll_up'
	) );
	
$wp_customize->add_section('documentaion', 
    array(
        'title'       => __( 'Documentaion', 'enigma' ),
        'priority'    => 100,
        'panel'=>'enigma_theme_option',
		'capability'=>'edit_theme_options',
    ) 
);
$wp_customize->add_setting( 'doc', array(
			'default'    		=> null,
			'sanitize_callback' => 'enigma_sanitize_text',
	));
	$wp_customize->add_control( new doc_control( $wp_customize, 'doc', array(
			'label'    => __( 'How to use elementor to create custom homepage?', 'enigma' ),
			'section'  => 'documentaion',
			'settings' => 'doc',
			'priority' => 1,
	)));
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'doc_control' ) ) :
class doc_control extends WP_Customize_Control {
	public function render_content() { ?>
		<label style="overflow: hidden; zoom: 1;">
						
			<div class="col-md-3 col-sm-6"> 
				<h2 style="margin-top:10px;color:#fff;background-color: #674665;padding: 10px;font-size: 18px;"><?php echo _e( 'How to use elementor plugin to create custom homepage?','enigma'); ?></h2>
					<ol style="padding-top:20px">
					<li> Install and activate elementor plugin. </li>
					<li> Create a new page and select page template "Template home-2" and publish. </li>
					<li> Now go to customizer -> Homepage Settings -> choose "A static page" option and select new page as a Homepage and publish.  </li>
					<li> Open Theme Options -> Theme General Options -> and disable the "Show Front Page" option.</li>
					</ol>
			</div>
		</label>
		<?php
	}
}
endif;


// code for comment
if ( ! function_exists( 'weblizar_comment' ) ) :
function weblizar_comment( $comment, $args, $depth ) 
{
	$GLOBALS['comment'] = $comment;
	//get theme data
	global $comment_data;
	//translations
	$leave_reply = $comment_data['translation_reply_to_coment'] ? $comment_data['translation_reply_to_coment'] : 
	__('Reply','enigma'); ?>
    <div class="media enigma_comment_box">
			<a class="pull_left_comment">
            <?php echo get_avatar($comment,$size = '60'); ?>
            </a>
           <div class="media-body">
			    <div class="enigma_comment_detail">
				<h4 class="enigma_comment_detail_title"><?php comment_author();?></h4>
				
				<span class="enigma_comment_date">
				<?php if ( ('d M  y') == get_option( 'date_format' ) ) : ?>				
				<?php comment_date('F j, Y');?>
				<?php else : ?>
				<?php comment_date(); ?>
				<?php endif; ?>
				<?php _e('at','enigma');?>&nbsp;<?php comment_time('g:i a'); ?></span>
				<?php comment_text() ; ?>				
				<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('reply_text' => $leave_reply,'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				
				<?php edit_comment_link(__('Quick Edit','enigma')); ?>
				</div>
				
				<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'enigma' ); ?></em>
				<br/>
				<?php endif; ?>
				</div>
			</div>							
	</div>		
<?php
}
endif;
?>