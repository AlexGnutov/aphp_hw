<?php

namespace Common;

class Utils
{
    static function printList(array $array): void {
        $x = 1;
        foreach ($array as $key => $value) {
            echo "  $x. $key(s) : $value" . PHP_EOL;
            $x++;
        }
    }

    static function collectMentionsByFieldName(array $array, string $fieldName): array {
        return array_count_values(
            array_map(
                function($element) use ($fieldName) {
                    return $element->$fieldName;
                },
                $array
            )
        );
    }
}