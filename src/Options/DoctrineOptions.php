<?php
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

namespace ZfrOAuth2\Server\Doctrine\Options;

/**
 * Options class
 *
 * @author  Michaël Gallego <mic.gallego@gmail.com>
 * @licence MIT
 */
class DoctrineOptions
{

    /**
     * @var string
     */
    private $tokenOwnerPkColumn = 'id';

    /**
     * Constructor
     *
     * @param  array|null $options
     */
    public function __construct($options = null)
    {
        if (null !== $options) {
            $this->setFromArray($options);
        }
    }

    /**
     * Set one or more configuration properties
     *
     * @param  array $options
     */
    public function setFromArray(array $options)
    {
        foreach ($options as $key => $value) {
            $setter = 'set' . str_replace('_', '', $key);
            $this->{$setter}($value);
        }
    }

    /**
     * @return string
     */
    public function getTokenOwnerPkColumn(): string
    {
        return $this->tokenOwnerPkColumn;
    }

    /**
     * @param string $tokenOwnerPkColumn
     */
    public function setTokenOwnerPkColumn(string $tokenOwnerPkColumn)
    {
        $this->tokenOwnerPkColumn = $tokenOwnerPkColumn;
    }
}
