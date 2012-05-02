<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Table tl_survey_question
 */
$GLOBALS['TL_DCA']['tl_survey_question'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_survey_page',
		'ctable'                      => array(),
		'enableVersioning'            => true,
		'onsubmit_callback' => array
		(
			array('tl_survey_question', 'setCompleteStatus')
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'filter'                  => true,
			'fields'                  => array('sorting'),
			'panelLayout'             => 'search,filter,limit',
			'headerFields'            => array('title', 'tstamp', 'description'),
			'child_record_callback'   => array('SurveyQuestionPreview', 'compilePreview')
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_survey_question']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_survey_question']['copy'],
				'href'                => 'act=paste&amp;mode=copy',
				'icon'                => 'copy.gif'
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_survey_question']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_survey_question']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_survey_question']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'            => array('questiontype','openended_subtype','multiplechoice_subtype', 'matrix_subtype', 'addother', 'addneutralcolumn', 'addbipolar'),
		'default'                 => '{title_legend},title,questiontype',
		'openended'               => '{title_legend},title,author,questiontype,openended_subtype,description,hidetitle,help,language;{question_legend},question;{obligatory_legend},obligatory;{specific_legend},openended_textbefore,openended_textafter,openended_textinside,openended_width,openended_maxlen',
		'multiplechoice'         => '{title_legend},title,author,questiontype,multiplechoice_subtype,description,hidetitle,help,language;{question_legend},question;{obligatory_legend},obligatory;{specific_legend},choices',
		'openendedoe_multiline'            => '{title_legend},title,author,questiontype,openended_subtype,description,hidetitle,help,language;{question_legend},question;{obligatory_legend},obligatory;{specific_legend},openended_textbefore,openended_textafter,openended_textinside,openended_rows,openended_cols,openended_maxlen',
		'openendedoe_integer'              => '{title_legend},title,author,questiontype,openended_subtype,description,hidetitle,help,language;{question_legend},question;{obligatory_legend},obligatory;{specific_legend},openended_textbefore,openended_textafter,openended_textinside,lower_bound,upper_bound',
		'openendedoe_float'                => '{title_legend},title,author,questiontype,openended_subtype,description,hidetitle,help,language;{question_legend},question;{obligatory_legend},obligatory;{specific_legend},openended_textbefore,openended_textafter,openended_textinside,lower_bound,upper_bound',
		'openendedoe_date'                => '{title_legend},title,author,questiontype,openended_subtype,description,hidetitle,help,language;{question_legend},question;{obligatory_legend},obligatory;{specific_legend},openended_textbefore,openended_textafter,openended_textinside,lower_bound_date,upper_bound_date',
		'openendedoe_time'                => '{title_legend},title,author,questiontype,openended_subtype,description,hidetitle,help,language;{question_legend},question;{obligatory_legend},obligatory;{specific_legend},openended_textbefore,openended_textafter,openended_textinside,lower_bound_time,upper_bound_time',
		'multiplechoicemc_singleresponse'    => '{title_legend},title,author,questiontype,multiplechoice_subtype,description,hidetitle,help,language;{question_legend},question;{obligatory_legend},obligatory;{specific_legend},choices,addother,mc_style',
		'multiplechoicemc_dichotomous'    => '{title_legend},title,author,questiontype,multiplechoice_subtype,description,hidetitle,help,language;{question_legend},question;{obligatory_legend},obligatory;{specific_legend},mc_style',
		'multiplechoicemc_multipleresponse'  => '{title_legend},title,author,questiontype,multiplechoice_subtype,description,hidetitle,help,language;{question_legend},question;{obligatory_legend},obligatory;{specific_legend},choices,addother,mc_style',
		'matrixmatrix_singleresponse'    => '{title_legend},title,author,questiontype,matrix_subtype,description,hidetitle,help,language;{question_legend},question;{obligatory_legend},obligatory;{rows_legend},matrixrows;{columns_legend},matrixcolumns,addneutralcolumn;{bipolar_legend},addbipolar',
		'matrixmatrix_multipleresponse'  => '{title_legend},title,author,questiontype,matrix_subtype,description,hidetitle,help,language;{question_legend},question;{obligatory_legend},obligatory;{rows_legend},matrixrows;{columns_legend},matrixcolumns,addneutralcolumn;{bipolar_legend},addbipolar',
		'constantsum'    => '{title_legend},title,author,questiontype,description,hidetitle,help,language;{question_legend},question;{obligatory_legend},obligatory;{specific_legend},sumchoices,inputfirst;{sum_legend},sumoption,sum',
	),

	// Subpalettes
	'subpalettes' => array
	(
		'addother'                    => 'othertitle',
		'addneutralcolumn'            => 'neutralcolumn',
		'addbipolar'                  => 'adjective1,adjective2,bipolarposition'
	),

	// Fields
	'fields' => array
	(
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['title'],
			'search'                  => true,
			'sorting'                 => true,
			'filter'                  => true,
			'flag'                    => 1,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'decodeEntities' => true, 'insertTag'=>true, 'tl_class'=>'w50')
		),
		'help' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['help'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50', 'decodeEntities' => true)
		),
		'questiontype' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['questiontype'],
			'default'                 => 'openended',
			'filter'                  => true,
			'inputType'               => 'select',
			'options_callback'        => array('tl_survey_question', 'getQuestiontypes'),
			'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'w50 clr')
		),
		'author' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['author'],
			'default'                 => $this->User->id,
			'filter'                  => true,
			'inputType'               => 'select',
			'foreignKey'              => 'tl_user.name',
			'eval'                    => array('tl_class'=>'w50','decodeEntities' => true)
		),
		'description' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['description'],
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('allowHtml'=>true, 'style'=>'height:80px;', 'tl_class'=>'clr','decodeEntities' => true)
		),
		'hidetitle' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['hidetitle'],
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 m12')
		),
		'question' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['question'],
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory'=>false, 'allowHtml'=>true, 'style'=>'height:80px;', 'rte'=>'tinyMCE', 'decodeEntities' => true)
		),
		'introduction' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['introduction'],
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('allowHtml'=>true, 'style'=>'height:80px;', 'rte'=>'tinyMCE', 'decodeEntities' => true)
		),
		'language' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['language'],
			'default'                 => $GLOBALS['TL_LANGUAGE'],
			'inputType'               => 'select',
			'options'                 => $this->getLanguages(),
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		'obligatory' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['obligatory'],
			'filter'                  => true,
			'inputType'               => 'checkbox'
		),
		'openended_subtype' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['openended_subtype'],
			'default'                 => 'oe_singleline',
			'inputType'               => 'select',
			'options_callback'        => array('tl_survey_question', 'getOpenEndedSubtypes'),
			'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'w50')
		),
		'openended_textbefore' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['openended_textbefore'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>150, 'tl_class'=>'w50', 'decodeEntities' => true)
		),
		'openended_textafter' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['openended_textafter'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>150, 'tl_class'=>'w50', 'decodeEntities' => true)
		),
		'openended_textinside' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['openended_textinside'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>150, 'tl_class'=>'w50', 'decodeEntities' => true)
		),
		'openended_rows' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['openended_rows'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>3, 'rgxp' => 'digit', 'tl_class'=>'w50', 'decodeEntities' => true)
		),
		'openended_cols' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['openended_cols'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>3, 'rgxp' => 'digit', 'tl_class'=>'w50', 'decodeEntities' => true)
		),
		'openended_maxlen' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['openended_maxlen'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>5, 'style' => 'width: 5em;', 'rgxp' => 'digit', 'tl_class'=>'w50', 'decodeEntities' => true)
		),
		'openended_width' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['openended_width'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>3, 'style' => 'width: 5em;', 'rgxp' => 'digit', 'tl_class'=>'w50', 'decodeEntities' => true)
		),
		'lower_bound' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['lower_bound'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>32, 'style' => 'width: 5em;', 'rgxp' => 'digit', 'tl_class'=>'clr w50', 'decodeEntities' => true)
		),
		'upper_bound' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['upper_bound'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>32, 'style' => 'width: 5em;', 'rgxp' => 'digit', 'tl_class'=>'w50', 'decodeEntities' => true)
		),
		'lower_bound_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['lower_bound'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>32, 'rgxp' => 'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'clr w50 wizard')
		),
		'upper_bound_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['upper_bound'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>32, 'rgxp' => 'date', 'datepicker'=>$this->getDatePickerString(), 'tl_class'=>'w50 wizard')
		),
		'lower_bound_time' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['lower_bound'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>32, 'rgxp' => 'time', 'tl_class'=>'clr w50')
		),
		'upper_bound_time' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['upper_bound'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>32, 'rgxp' => 'time', 'tl_class'=>'w50')
		),
		'multiplechoice_subtype' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['multiplechoice_subtype'],
			'default'                 => 'mc_singleresponse',
			'inputType'               => 'select',
			'options_callback'        => array('tl_survey_question', 'getMultipleChoiceSubtypes'),
			'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'w50')
		),
		'choices' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['choices'],
			'exclude'                 => true,
			'inputType'               => 'textwizard',
			'wizard'                  => array(array('tl_survey_question', 'addScaleWizard')),
			'eval'                    => array(
				'allowHtml'=>true, 
				'decodeEntities' => true, 
				'buttonTitles' => array(
					'new' => $GLOBALS['TL_LANG']['tl_survey_question']['buttontitle_new'], 
					'copy' => $GLOBALS['TL_LANG']['tl_survey_question']['buttontitle_copy'], 
					'delete' => $GLOBALS['TL_LANG']['tl_survey_question']['buttontitle_delete']
				)
			)
		),
		'sumchoices' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['choices'],
			'exclude'                 => true,
			'inputType'               => 'textwizard',
			'eval'                    => array('allowHtml'=>true, 'decodeEntities' => true)
		),
		'addother' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['addother'],
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'othertitle' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['othertitle'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>150, 'decodeEntities' => true)
		),
		'matrix_subtype' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['matrix_subtype'],
			'default'                 => 'matrix_singleresponse',
			'inputType'               => 'select',
			'options_callback'        => array('tl_survey_question', 'getMatrixSubtypes'),
			'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'w50')
		),
		'matrixrows' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['matrixrows'],
			'exclude'                 => true,
			'inputType'               => 'textwizard',
			'eval'                    => array(
				'allowHtml'=>true, 
				'decodeEntities' => true, 
				'buttonTitles' => array(
					'new' => $GLOBALS['TL_LANG']['tl_survey_question']['buttontitle_matrixrow_new'], 
					'copy' => $GLOBALS['TL_LANG']['tl_survey_question']['buttontitle_matrixrow_copy'], 
					'delete' => $GLOBALS['TL_LANG']['tl_survey_question']['buttontitle_matrixrow_delete']
				)
			)
		),
		'matrixcolumns' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['matrixcolumns'],
			'exclude'                 => true,
			'inputType'               => 'textwizard',
			'eval'                    => array(
				'allowHtml'=>true, 
				'decodeEntities' => true, 
				'buttonTitles' => array(
					'new' => $GLOBALS['TL_LANG']['tl_survey_question']['buttontitle_matrixcolumn_new'], 
					'copy' => $GLOBALS['TL_LANG']['tl_survey_question']['buttontitle_matrixcolumn_copy'], 
					'delete' => $GLOBALS['TL_LANG']['tl_survey_question']['buttontitle_matrixcolumn_delete']
				)
			)
		),
		'addneutralcolumn' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['addneutralcolumn'],
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'neutralcolumn' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['neutralcolumn'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'mandatory' => true, 'decodeEntities' => true)
		),
		'addbipolar' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['addbipolar'],
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'adjective1' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['adjective1'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'mandatory' => true, 'tl_class'=>'w50', 'decodeEntities' => true)
		),
		'adjective2' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['adjective2'],
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'mandatory' => true, 'tl_class'=>'w50', 'decodeEntities' => true)
		),
		'bipolarposition' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['bipolarposition'],
			'default'                 => 'top',
			'inputType'               => 'select',
			'options'                 => array('top', 'aside'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_survey_question']['bipolarposition'],
			'eval'                    => array('tl_class'=>'w50')
		),
		'mc_style' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['mc_style'],
			'default'                 => 'vertical',
			'inputType'               => 'select',
			'options_callback'        => array('tl_survey_question', 'getMCStyleOptions'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_survey_question']['mc_style']
		),
		'inputfirst' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['inputfirst'],
			'inputType'               => 'checkbox'
		),
		'sumoption' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['sumoption'],
			'default'                 => 'exact',
			'inputType'               => 'select',
			'options'                 => array('exact', 'max'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_survey_question']['sum']
		),
		'sum' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_survey_question']['sum'],
			'default'                 => 100,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>10, 'mandatory' => true, 'rgxp' => 'digit', 'decodeEntities' => true)
		)
	)
);

/**
 * Class tl_survey_question
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Helmut Schottmüller 2009
 * @author     Helmut Schottmüller <typolight@aurealis.de>
 * @package    Controller
 */
class tl_survey_question extends Backend
{
	/**
	 * Add an image to each record
	 * @param array
	 * @param string
	 * @return string
	 */
	public function addIcon($row, $label)
	{
		return sprintf('<div class="list_icon" style="background-image:url(\'system/modules/survey_ce/html/images/question.png\');">%s</div>', $label);
	}
	
	/**
	 * Return all questiontypes as an array
	 * @return array
	 */
	public function getQuestiontypes()
	{
		$qt = array();

		$qt["openended"] = $GLOBALS['TL_LANG']['tl_survey_question']['openended'];
		$qt["multiplechoice"] = $GLOBALS['TL_LANG']['tl_survey_question']['multiplechoice'];
		$qt["matrix"] = $GLOBALS['TL_LANG']['tl_survey_question']['matrix'];
		$qt["constantsum"] = $GLOBALS['TL_LANG']['tl_survey_question']['constantsum'];
		return $qt;
	}
	
	public function getOpenEndedSubtypes()
	{
		$oe = array();
		$oe["oe_singleline"] = $GLOBALS['TL_LANG']['tl_survey_question']['oe_singleline'];
		$oe["oe_multiline"] = $GLOBALS['TL_LANG']['tl_survey_question']['oe_multiline'];
		$oe["oe_integer"] = $GLOBALS['TL_LANG']['tl_survey_question']['oe_integer'];
		$oe["oe_float"] = $GLOBALS['TL_LANG']['tl_survey_question']['oe_float'];
		$oe["oe_date"] = $GLOBALS['TL_LANG']['tl_survey_question']['oe_date'];
		$oe["oe_time"] = $GLOBALS['TL_LANG']['tl_survey_question']['oe_time'];
		return $oe;
	}

	public function getMultipleChoiceSubtypes()
	{
		$mc = array();
		$mc["mc_singleresponse"] = $GLOBALS['TL_LANG']['tl_survey_question']['mc_singleresponse'];
		$mc["mc_multipleresponse"] = $GLOBALS['TL_LANG']['tl_survey_question']['mc_multipleresponse'];
		$mc["mc_dichotomous"] = $GLOBALS['TL_LANG']['tl_survey_question']['mc_dichotomous'];
		return $mc;
	}

	public function getMatrixSubtypes()
	{
		$mc = array();
		$mc["matrix_singleresponse"] = $GLOBALS['TL_LANG']['tl_survey_question']['mc_singleresponse'];
		$mc["matrix_multipleresponse"] = $GLOBALS['TL_LANG']['tl_survey_question']['mc_multipleresponse'];
		return $mc;
	}

	public function setCompleteStatus(DataContainer $dc)
	{
		$this->Database->prepare("UPDATE tl_survey_question SET complete = ?, original = ? WHERE id=?")
			->execute(1, 1, $dc->id);
	}
	
	public function getMCStyleOptions(DataContainer $dc)
	{
		$objQuestion = $this->Database->prepare("SELECT multiplechoice_subtype FROM tl_survey_question WHERE id=?")
			->limit(1)
			->execute($dc->id);
		if (strcmp($objQuestion->multiplechoice_subtype, 'mc_multipleresponse') == 0)
		{
			return array('vertical', 'horizontal');
		}
		else
		{
			return array('vertical', 'horizontal', 'select');
		}
	}
	
	public function addScaleWizard(DataContainer $dc)
	{
		$objQuestion = $this->Database->prepare("SELECT multiplechoice_subtype FROM tl_survey_question WHERE id=?")
			->limit(1)
			->execute($dc->id);
		if (strcmp($objQuestion->multiplechoice_subtype, 'mc_singleresponse') == 0)
		{
			return '<a href="' . $this->addToUrl('key=scale') . '" title="' . specialchars($GLOBALS['TL_LANG']['tl_survey_question']['addscale'][1]) . '" onclick="Backend.getScrollOffset();">' . $this->generateImage('system/modules/survey_ce/html/images/scale.png', $GLOBALS['TL_LANG']['tl_survey_question']['addscale'][0], 'style="vertical-align:text-bottom;"') . '</a> <a href="' . $this->addToUrl('key=scale') . '" title="' . specialchars($GLOBALS['TL_LANG']['tl_survey_question']['addscale'][1]) . '" onclick="Backend.getScrollOffset();">' . specialchars($GLOBALS['TL_LANG']['tl_survey_question']['addscale'][0]) . '</a>';
		}
		return '';
	}

	/**
	 * Return a form to choose a CSV file and import it
	 * @param object
	 * @return string
	 */
	public function addScale(DataContainer $dc)
	{
		if ($this->Input->get('key') != 'scale')
		{
			return '';
		}

		$objSurvey = $this->Database->prepare("SELECT tl_survey.language FROM tl_survey WHERE tl_survey.id=(SELECT pid FROM tl_survey_page WHERE tl_survey_page.id=(SELECT tl_survey_question.pid FROM tl_survey_question WHERE tl_survey_question.id=?))")
			->limit(1)
			->execute($dc->id);

		$objScales = $this->Database->prepare("SELECT tl_survey_scale.*, tl_survey_scale_folder.title AS folder FROM tl_survey_scale, tl_survey_scale_folder WHERE tl_survey_scale.language=? AND tl_survey_scale.pid = tl_survey_scale_folder.id ORDER BY tl_survey_scale_folder.title, tl_survey_scale.title")
			->execute($objSurvey->language);

		$arrScales = array();
		while ($objScales->next())
		{
			$arrScales[$objScales->id] = array('title' => $objScales->title, 'scales' => deserialize($objScales->scale, true), 'folder' => $objScales->folder);
		}

		// Add scale
		if ($this->Input->post('FORM_SUBMIT') == 'tl_add_scale')
		{
			if ((!$this->Input->post('scale') || strcmp($this->Input->post('scale'), '-') == 0))
			{
				$_SESSION['TL_ERROR'][] = $GLOBALS['TL_LANG']['ERR']['selectoption'];
				$this->reload();
			}

			$this->Database->prepare("UPDATE tl_survey_question SET choices=? WHERE id=?")
				->execute(serialize($arrScales[$this->Input->post('scale')]['scales']), $dc->id);

			setcookie('BE_PAGE_OFFSET', 0, 0, '/');
			$this->redirect(str_replace('&key=scale', '', $this->Environment->request));
		}

		// Return form
		$result = '
<div id="tl_buttons">
<a href="'.ampersand(str_replace('&key=scale', '', $this->Environment->request)).'" class="header_back" title="'.specialchars($GLOBALS['TL_LANG']['MSC']['backBT']).'">'.$GLOBALS['TL_LANG']['MSC']['backBT'].'</a>
</div>

<h2 class="sub_headline">'.$GLOBALS['TL_LANG']['tl_survey_question']['addscale'][0].'</h2>'.$this->getMessages().'

<form action="'.ampersand($this->Environment->request, ENCODE_AMPERSANDS).'" id="tl_add_scale" class="tl_form" method="post">
<div class="tl_formbody_edit">
<input type="hidden" name="FORM_SUBMIT" value="tl_add_scale" />

<div class="tl_tbox">
  <h3><label for="scale">'.$GLOBALS['TL_LANG']['tl_survey_question']['scale'][0].'</label></h3>
  <select name="scale" id="scale" class="tl_select" onfocus="Backend.getScrollOffset();">
		<option value="-">-</option>\n';
		$lastfolder = "";
		foreach ($arrScales as $id => $scale)
		{
			if (strcmp($scale['folder'], $lastfolder) != 0)
			{
				if (strlen($lastfolder)) $result .= '</optgroup>';
				$result .= '<optgroup label="' . specialchars($scale['folder']) . '">';
			}
			$result .= '<option value="' . specialchars($id) . '">' . specialchars($scale['title']) . '</option>\n';
			$lastfolder = $scale['folder'];
		}
		$result .= '</optgroup>';
		$result .= '  </select>'.(strlen($GLOBALS['TL_LANG']['tl_survey_question']['scale'][1]) ? '
  <p class="tl_help">'.$GLOBALS['TL_LANG']['tl_survey_question']['scale'][1].'</p>' : '').'
</div>

</div>

<div class="tl_formbody_submit">

<div class="tl_submit_container">
<input type="submit" name="save" id="save" class="tl_submit" alt="add scale" accesskey="s" value="'.specialchars($GLOBALS['TL_LANG']['tl_survey_question']['save_add_scale']).'" /> 
</div>

</div>
</form>';
		return $result;
	}
}

?>