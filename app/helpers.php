<?php

function uc_without_accents($body_imploded, $enc = "utf-8")
        {
            return strtr(
                mb_strtoupper($body_imploded, $enc),
                array(
                    'Ά' => 'Α', 'Έ' => 'Ε', 'Ί' => 'Ι', 'Ή' => 'Η', 'Ύ' => 'Υ',
                    'Ό' => 'Ο', 'Ώ' => 'Ω', 'A' => 'A', 'A' => 'A', 'A' => 'A', 'A' => 'A',
                    'Y' => 'Y', 'ΐ' => 'Ϊ'
                )
            );
        }
