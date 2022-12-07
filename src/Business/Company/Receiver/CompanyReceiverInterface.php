<?php
/**
 * This file is part of the XMCY-ODC PHP Exercise - v21.0.5.
 *
 * (c) Stanislau Komar <stanislau_komar@epam.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Business\Company\Receiver;

use App\Model\Company\CompanyInterface;

/**
 * @author Stanislau Komar <head.trackingsoft@gmail.com>
 */
interface CompanyReceiverInterface
{
    /**
     * @return iterable<CompanyInterface>
     */
    public function receiveCompanyCollection(): iterable;
}
