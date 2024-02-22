<?php declare(strict_types=1);
/**
 * (c) 2005-2024 Dmitry Lebedev <dl@adios.ru>
 * This source code is part of the Ultra library.
 * Please see the LICENSE file for copyright and licensing information.
 */
namespace Ultra\Dominant;

/**
 * Реализация интерфейса Ultra\Dominant\BackedEnum.
 * Расширяет функционал трейта Ultra\Dominant\UnitCase реализацию интерфейса
 * Ultra\Dominant\UnitEnum.
 */
trait BackedCase {
	use UnitCase;

	final public static function getMainValue(): int|string|null {
		return self::main()->value;
	}

	final public static function setMainByValue(int|string $value): self|null {
		return self::main(self::tryFrom($value));
	}
}
