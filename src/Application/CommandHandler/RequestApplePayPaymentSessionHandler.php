<?php
/**
 * Mollie       https://www.mollie.nl
 *
 * @author      Mollie B.V. <info@mollie.nl>
 * @copyright   Mollie B.V.
 * @license     https://github.com/mollie/PrestaShop/blob/master/LICENSE.md
 *
 * @see        https://github.com/mollie/PrestaShop
 * @codingStandardsIgnoreStart
 */

namespace Mollie\Application\CommandHandler;

use Cart;
use Exception;
use Mollie;
use Mollie\Application\Command\RequestApplePayPaymentSession;
use Mollie\Service\ApiService;

final class RequestApplePayPaymentSessionHandler
{
    /**
     * @var Mollie
     */
    private $module;
    /**
     * @var ApiService
     */
    private $apiService;

    public function __construct(Mollie $module, ApiService $apiService)
    {
        $this->module = $module;
        $this->apiService = $apiService;
    }

    public function handle(RequestApplePayPaymentSession $command): array
    {
        try {
            $response = $this->apiService->requestApplePayPaymentSession($this->module->api, $command->getValidationUrl());
        } catch (Exception $e) {
            return [
                'success' => false,
                'errors' => $e->getMessage(),
            ];
        }

        $cartId = $this->createEmptyCart($command->getCurrencyId(), $command->getLangId());

        return [
            'success' => true,
            'data' => $response,
            'cartId' => $cartId
        ];
    }

    private function createEmptyCart(int $currencyId, int $langId): int
    {
        $cart = new Cart();
        $cart->id_currency = $currencyId;
        $cart->id_lang = $langId;
        $cart->id_address_invoice = 1;
        $cart->save();

        return (int) $cart->id;
    }
}