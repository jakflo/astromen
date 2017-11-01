<?php
// source: C:\Program Files (x86)\Ampps\www\astro\app\presenters/templates/astro/default.latte

use Latte\Runtime as LR;

class Templateb9db0a1c90 extends Latte\Runtime\Template
{
	public $blocks = [
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['astro_row'])) trigger_error('Variable $astro_row overwritten in foreach on line 9');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
<h2>Astronauti</h2>
<table id="astro_tab" class="norm_tab">
    <tr>
        <th>Jméno</th><th>Příjmení</th><th>Datum narození</th><th>Schopnost</th>
    </tr>
<?php
		$iterations = 0;
		foreach ($astro_tab as $astro_row) {
			?>        <tr data-id="<?php echo LR\Filters::escapeHtmlAttr($astro_row->id) /* line 10 */ ?>">
            <td class="fname"><?php echo LR\Filters::escapeHtmlText($astro_row->f_name) /* line 11 */ ?></td>
            <td class="lname"><?php echo LR\Filters::escapeHtmlText($astro_row->l_name) /* line 12 */ ?></td>
            <td class="DOB"><?php echo LR\Filters::escapeHtmlText($astro_row->DOB) /* line 13 */ ?></td>
            <td class="skill"><?php echo LR\Filters::escapeHtmlText($astro_row->skill) /* line 14 */ ?></td>
        </tr>
<?php
			$iterations++;
		}
?>
</table>
<button id="add">Přidat nového</button>
<button id="mod" disabled>Upravit</button>
<button id="del" disabled>Smazat</button>


<div id="form_modal" class="modal">
<table id="astro_form">
    <form name="astro_form">
        <tr>
            <th>Jméno</th>
            <td><input type="text" name="fname" value="" size="15"></td>
            <td id="fname_err" class="form_err"></td>
        </tr>
        <tr>
            <th>Příjmení</th>
            <td><input type="text" name="lname" value="" size="15"></td>
            <td id="lname_err" class="form_err"></td>
        </tr>
        <tr>
            <th>Datum narození</th>
            <td>
                <input type="text" name="DOB_day" value="" size="1">.
                <input type="text" name="DOB_mon" value="" size="1">.
                <input type="text" name="DOB_year" value="" size="2">
            </td>
            <td id="DOB_err" class="form_err"></td>
        <tr>
            <th>Schopnost</th>
            <td> <textarea name="skill" rows="2" cols="15"></textarea> </td>
            <td id="skill_err" class="form_err"></td>
        </tr>    
        </tr>
    </form>
            <th></th>
            <td>
                <button id="send">Přidat</button>
                <button id="cancel">Zrušit</button>
            </td>
</table>
<p id="doop_err" class="form_err" style="display: none;">Duplicidní záznam</p>
</div>

<div class="modal" id="modal_droprow_confirm">
    <h3>Skutečně si přejete smazat kosmonauta <span id="dropping_astro_name"></span>?</h3>
    <button id="row_drop_yes">Ano</button>
    <button id="row_drop_no">Ne</button>
</div>


<a href="/" style="display: none;" id="reload"></a>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="\js\astromen.js"></script>
<?php
	}

}
