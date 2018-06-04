<?php 

/**
 * Helper asset()
 * ------------------------------------------------------------------------
 * @access  public
 * @param   string
 * @return  string
 */
if (!function_exists('getLang'))
{
    function getLang($context)
    {
        if ($context->session->userdata('site_lang') == '')
        {
            $context->session->set_userdata('site_lang', 'italian');
        }
        return $context->session->userdata('site_lang');
    }
}

?>