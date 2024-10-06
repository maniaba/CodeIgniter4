<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter 4 framework.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace CodeIgniter\Test\Mock;

use CodeIgniter\HTTP\CURLRequest;

/**
 * Class MockCURLRequest
 *
 * Simply allows us to not actually call cURL during the
 * test runs. Instead, we can set the desired output
 * and get back the set options.
 */
class MockCURLRequest extends CURLRequest
{
    public array $curl_options;
    protected string $output = '';

    public function setOutput(string $output): static
    {
        $this->output = $output;

        return $this;
    }

    protected function sendRequest(array $curlOptions = []): string
    {
        $this->response = clone $this->responseOrig;

        // Save so we can access later.
        $this->curl_options = $curlOptions;

        return $this->output;
    }

    // for testing purposes only
    public function getBaseURI()
    {
        return $this->baseURI;
    }

    // for testing purposes only
    public function getDelay()
    {
        return $this->delay;
    }
}
