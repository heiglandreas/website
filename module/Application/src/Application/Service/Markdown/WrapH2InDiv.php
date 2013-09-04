<?php
/**
 * Copyright (c)2013-2013 heiglandreas
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIBILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @category 
 * @author    Andreas Heigl<andreas@heigl.org>
 * @copyright ©2013-2013 Andreas Heigl
 * @license   http://www.opesource.org/licenses/mit-license.php MIT-License
 * @version   0.0
 * @since     03.09.13
 * @link      https://github.com/heiglandreas/
 */

namespace Application\Service\Markdown;


class WrapH2InDiv implements PostProcessorInterface
{
    /**
     * @param DOMDocument $xml
     */
    public function process(\DOMDocument $xml)
    {
        $xPath = new \DOMXPath($xml);
        $nodes = $xPath->query('//h2');
        foreach ($nodes as $node) {
            $div = $xml->createElement('div');
            $h2 = $node->parentNode->replaceChild($div, $node);
            $div->appendChild($h2);
            $h2->setAttribute('id', preg_replace('/[^a-z0-9]/', '_', strtolower($h2->textContent)));
            $div->setAttribute('class', 'page-header');
        }

        return $xml;
    }
}