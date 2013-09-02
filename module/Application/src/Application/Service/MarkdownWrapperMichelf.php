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
 * @since     02.09.13
 * @link      https://github.com/heiglandreas/
 */

namespace Application\Service;

use Michelf\MarkdownExtra;

class MarkdownWrapperMichelf implements MarkdownParserInterface
{
    protected $wrapped = null;

    public function __construct()
    {
        $this->wrapped = new MarkdownExtra();
    }

    public function transform($string)
    {
        $string = $this->getContent($string);
        return $this->wrapped->transform($string);
    }

    public function __set($name, $value)
    {
        $this->wrapped->$name = $value;
    }

    public function __get($name)
    {
        return $this->wrapped->$name;
    }

    public function getContent($request)
    {
        $array = explode('\\', $request->getParam('controller'));

        $module     = strtolower($array[0]);
        $controller = strtolower(str_Replace('Controller', '', $array[count($array)-1]));
        $action     = $request->getParam('action');

        $path = 'module'
              . DIRECTORY_SEPARATOR
              . ucfirst($module)
              . DIRECTORY_SEPARATOR
              . 'content'
              . DIRECTORY_SEPARATOR
              . $module
              . DIRECTORY_SEPARATOR
              . $controller
              . DIRECTORY_SEPARATOR
              . $action . '.md';

        return file_get_contents($path);
    }
}