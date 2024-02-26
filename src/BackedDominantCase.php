<?php declare(strict_types=1);
/**
 * (c) 2005-2024 Dmitry Lebedev <dl@adios.ru>
 * This source code is part of the Ultra library.
 * Please see the LICENSE file for copyright and licensing information.
 */
namespace Ultra\Enum;

/**
 * Реализация интерфейса Ultra\Enum\BackedDominant.
 * Расширяет функционал трейта Ultra\Enum\DominantCase реализацию интерфейса
 * Ultra\Enum\Dominant.
 */
trait BackedDominantCase {
	use DominantCase;

	final public static function getMainValue(): int|string|null {
		return self::main()->value;
	}

	final public static function setMainByValue(int|string $value): self|null {
		return self::main(self::tryFrom($value));
	}
}
